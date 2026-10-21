<?php
use App\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class PasswordResetTest extends TestCase
{
    use DatabaseTransactions;
    public function test_password_reset_link_and_token_reset_work_without_sending_real_mail(): void
    {
        Notification::fake();
        $user=User::create(['name'=>'Parity','email'=>'reset-parity@example.test','password'=>bcrypt('OldFixture123!')]);
        $this->get('/password/reset')->assertOk();
        $this->post('/password/email',['email'=>$user->email])->assertSessionHasNoErrors();
        $token=null;
        Notification::assertSentTo($user,ResetPassword::class,function($notification)use(&$token){$token=$notification->token;return true;});
        $this->get('/password/reset/'.$token)->assertOk();
        $this->post('/password/reset',['email'=>$user->email,'token'=>$token,'password'=>'NewFixture123!','password_confirmation'=>'NewFixture123!'])->assertSessionHasNoErrors()->assertRedirect();
        $this->assertTrue(Hash::check('NewFixture123!',$user->fresh()->password));
        $this->assertAuthenticatedAs($user);
    }
}
