<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Project;
use App\Services\ImageService;
use App\Type;
use Illuminate\Http\Request;
use Intervention\Image\Image;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return  \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        return view('admin.projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ProjectRequest|Request $request
     * @param ImageService $intervention
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectRequest $request, ImageService $intervention)
    {
        Project::create([
            'title' => $request->get('title'),
            'link' => $request->get('link'),
            'type_id' => $request->get('type_id'),
            'client' => $request->get('client'),
            'date' => $request->get('date'),
            'description' => $request->get('description'),
            'image' => $intervention->saveMainPicture($request->file('image')),
        ]);
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project = Project::find($id);
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest|Request $request
     * @param    int $id
     * @param Image $intervention
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectRequest $request, $id, ImageService $intervention)
    {
        $project = Project::find($id);
        $project->title = $request->get('title');
        $project->links = $request->get('links');
        $project->type = $request->get('type');
        $project->client = $request->get('client');
        $project->date = $request->get('date');
        $project->description = $request->get('description');
        $project->image = $intervention->saveMainPicture($request->get('image'));
        $project->save();
        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    int $id
     * @return  \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return back();
    }
}
