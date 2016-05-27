<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\ProjectRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Project;
use App\Services\ImageService;
use App\Type;
use Carbon\Carbon;
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
        $projects = Project::orderBy('id', 'desc')->get();
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
        $project = new Project();
        $project->title = $request->get('title');
        $project->link = $request->get('link');
        $project->type_id = $request->get('type_id');
        $project->client = $request->get('client');
        $project->date = Carbon::createFromFormat('Y', $request->get('date'));
        $project->description = $request->get('description');
        $project->image = $intervention->saveMainPicture($request->file('image'));
        $project->save();
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
        $types = Type::all();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ProjectRequest|Request $request
     * @param    int $id
     * @param ImageService|Image $intervention
     * @return \Illuminate\Http\Response
     */
    public function update(ProjectUpdateRequest $request, $id, ImageService $intervention)
    {
        $project = Project::find($id);
        $project->title = $request->get('title');
        $project->link = $request->get('link');
        $project->type_id = $request->get('type_id');
        $project->client = $request->get('client');
        $project->date = Carbon::createFromFormat('Y', $request->get('date'));
        $project->description = $request->get('description');
        if ($request->hasFile('image'))
            $project->image = $intervention->saveMainPicture($request->file('image'));
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
