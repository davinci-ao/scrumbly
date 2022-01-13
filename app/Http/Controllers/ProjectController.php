<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Panel;
use App\Models\Feature;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('homepage', ['projects' => $projects]);
    }

    public function projectIndex($slug){
        $project = Project::where('name', '=', $slug)->first();
        $panels = $project->panels;
        $features = Feature::all();
        return view('project', compact(['project', 'panels', 'features']));
    }
}
