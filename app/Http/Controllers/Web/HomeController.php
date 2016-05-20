<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $projects = Project::all();
        return view('web.index', compact('projects'));
    }
}
