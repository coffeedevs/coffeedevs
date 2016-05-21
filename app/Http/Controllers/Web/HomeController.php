<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Project;
use App\Type;

class HomeController extends Controller
{
    function index()
    {
        $projects = Project::all();
        $types = Type::all();
        return view('web.index', compact('projects', 'types'));
    }
}
