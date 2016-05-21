<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ProjectsTest extends TestCase
{
    use DatabaseTransactions;
    use WithoutMiddleware;

    public function test_creation_of_a_project()
    {
        $image = new UploadedFile(public_path('images/project-1.png'), 'project-1.png', "image/png", null, null, true);
        $data = [
            'title' => 'Title',
            'link' => 'http://google.com',
            'type_id' => 1,
            'client' => 'Client',
            'date' => '2016',
            'description' => 'Description',
            'image' => $image,
        ];
        $this->post('admin/projects', $data)
            ->seePageIs('admin/projects');
    }

}
