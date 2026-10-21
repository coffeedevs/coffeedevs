<?php
use App\Project;
use App\User;
use App\Type;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class ProjectsTest extends TestCase
{
    use DatabaseTransactions;
    private array $files=[];
    protected function tearDown(): void
    {
        foreach($this->files as $f)if(is_file($f))unlink($f);
        parent::tearDown();
    }
    private function admin(): User
    {
        return User::create(['name'=>'Parity','email'=>'migration-parity@example.test','password'=>bcrypt('LocalFixture123!')]);
    }
    public function test_creation_of_a_project(): void
    {
        $this->actingAs($this->admin());
        $type=new Type();$type->name='Parity';$type->code='parity';$type->save();
        $data=['title'=>'Title','link'=>'https://example.test','type_id'=>$type->id,'client'=>'Client',
            'date'=>'2016','description'=>'Description','image'=>UploadedFile::fake()->image('project.png',1200,900)];
        $this->post('/admin/projects',$data)->assertRedirect(route('admin.projects.index'));
        $project=Project::latest('id')->firstOrFail();
        $this->files[]=$original=public_path('images/projects/'.$project->image);
        $this->files[]=$resized=public_path('images/projects/resized/'.$project->image);
        $this->assertDatabaseHas('projects',['title'=>'Title']);
        $this->assertSame([400,300],array_slice(getimagesize($resized),0,2));
        $this->get('/admin/projects')->assertOk()->assertSee('Title');
        $this->get('/admin/projects/'.$project->id.'/edit')->assertOk()->assertSee('2016');
        unset($data['image']);$data['title']='Updated';$this->put('/admin/projects/'.$project->id,$data)->assertRedirect(route('admin.projects.index'));
        $this->assertDatabaseHas('projects',['id'=>$project->id,'title'=>'Updated']);
        $this->delete('/admin/projects/'.$project->id)->assertRedirect();
        $this->assertDatabaseMissing('projects',['id'=>$project->id]);
    }
    public function test_public_pages_and_admin_authentication(): void
    {
        Http::preventStrayRequests();
        Http::fake(['blog.coffeedevs.com/*'=>Http::response('<?xml version="1.0"?><rss version="2.0"><channel><title>Blog</title><link>https://example.test</link><description>Feed</description></channel></rss>')]);
        $this->get('/')->assertOk();$this->get('/services')->assertOk();$this->get('/login')->assertOk();
        $this->get('/admin')->assertRedirect('/login');
        $this->get('/register')->assertRedirect('/login');
        $user=$this->admin();$hash=$user->password;
        $this->post('/login',['email'=>$user->email,'password'=>'LocalFixture123!'])->assertRedirect('/admin');
        $this->assertSame($hash,$user->fresh()->password);
        $this->get('/admin')->assertOk();$this->get('/admin/password')->assertOk();
        $this->post('/logout')->assertRedirect('/');$this->assertGuest();
    }
}
