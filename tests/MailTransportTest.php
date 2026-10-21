<?php
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Env;

class MailTransportTest extends TestCase
{
    public function test_sparkpost_sends_the_expected_envelope_through_fake_api(): void
    {
        $requests=[];
        $handler=HandlerStack::create(new MockHandler([new Response(200,[],json_encode(['results'=>[
            'total_rejected_recipients'=>0,'total_accepted_recipients'=>1,'id'=>'test-transmission']]))]));
        $handler->push(Middleware::history($requests));
        $this->app->instance(\Psr\Http\Client\ClientInterface::class,new Client(['handler'=>$handler]));
        config(['services.sparkpost.secret'=>'fake-sparkpost-key']);
        Mail::mailer('sparkpost')->raw('Parity message',function($message){
            $message->from('sender@example.test')->to('recipient@example.test')->subject('Parity subject');
        });
        $this->assertCount(1,$requests);
        $request=$requests[0]['request'];
        $this->assertSame('https://api.sparkpost.com/api/v1/transmissions',(string)$request->getUri());
        $this->assertSame('fake-sparkpost-key',$request->getHeaderLine('Authorization'));
        $payload=json_decode((string)$request->getBody(),true);
        $this->assertStringContainsString('Parity message',$payload['content']['text']);
        $this->assertStringContainsString('recipient@example.test',json_encode($payload['recipients']));
    }
    public function test_smtp_legacy_tls_configuration_is_enforced_without_network(): void
    {
        $repo=Env::getRepository();$old=$repo->get('MAIL_ENCRYPTION');$oldPort=$repo->get('MAIL_PORT');
        try {
            $repo->clear('MAIL_ENCRYPTION');
            $config=require config_path('mail.php');
            $this->assertTrue($config['mailers']['smtp']['require_tls']);
            $repo->set('MAIL_ENCRYPTION','tls');$repo->set('MAIL_PORT','587');
            $config=require config_path('mail.php');$config['mailers']['smtp']['host']='smtp.example.test';
            config(['mail.mailers.smtp'=>$config['mailers']['smtp']]);
            Mail::purge('smtp');$transport=Mail::mailer('smtp')->getSymfonyTransport();
            $this->assertTrue($transport->isTlsRequired());$this->assertStringStartsWith('smtp://',(string)$transport);
            $repo->set('MAIL_ENCRYPTION','ssl');$repo->set('MAIL_PORT','2525');
            $config=require config_path('mail.php');config(['mail.mailers.smtp'=>$config['mailers']['smtp']]);
            Mail::purge('smtp');$this->assertStringStartsWith('smtps://',(string)Mail::mailer('smtp')->getSymfonyTransport());
        } finally {
            $old===null?$repo->clear('MAIL_ENCRYPTION'):$repo->set('MAIL_ENCRYPTION',$old);
            $oldPort===null?$repo->clear('MAIL_PORT'):$repo->set('MAIL_PORT',$oldPort);
        }
    }
    public function test_legacy_mail_driver_selects_sparkpost_as_default_transport(): void
    {
        $code = <<<'CODE'
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->loadEnvironmentFrom('.env.nonexistent-mail-parity');
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
echo config('mail.default').'|'.get_class(app('mailer')->getSymfonyTransport());
CODE;
        $process = new \Symfony\Component\Process\Process([PHP_BINARY, '-r', $code], base_path(),
            ['MAIL_MAILER'=>false, 'MAIL_DRIVER'=>'sparkpost', 'SPARKPOST_SECRET'=>'fake-key']);
        $process->mustRun();
        $this->assertSame('sparkpost|Hampel\\SparkPost\\Transport\\SparkPostTransport',trim($process->getOutput()));
    }
}
