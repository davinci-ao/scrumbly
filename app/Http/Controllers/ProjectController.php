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
        $project = Project::where('slug', '=', $slug)->first();
        $panels = $project->panels;
        $features = Feature::all();
        return view('project', compact(['project', 'panels', 'features']));
    }
    public function projectIndexID($project_id){
        $project = Project::find($project_id);
        $panels = $project->panels;
        $features = Feature::all();
        return view('project', compact(['project', 'panels', 'features']));
    }

    public function edit(Request $request, $project_id){ 
        $project = Project::find($request->project_id);
        $project->name = $request->name;
        $project->discription = $request->discription;
        $project->slug = $request->slug;
        $project->save();
        return redirect()->route('projectIndex', ['slug' => $request->input('slug')]);
    }
}
