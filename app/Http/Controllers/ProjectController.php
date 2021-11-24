<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
// use App\Models\Sprint;
// use App\Models\Feature;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
//      $sprints = Sprint::all();   - Needs to be properly connected to the projects
//      $features = Feature::all();   - fix in sprint 2
        return view('homepage', ['projects' => $projects]);
    }
}
