<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Panel;
use App\Models\Feature;

class ProjectController extends Controller
{
    /**
     * index, collects all the projects and returns to homepage
     *
     * @return view
     */
    public function index()
    {
        $projects = Project::all();
        return view('homepage', ['projects' => $projects]);
    }

    /**
     * projectIndex, collects all the projects and returns to the project page
     *
     * @param [int] $slug
     * @return view
     */
    public function projectIndex($slug){
        $project = Project::where('slug', '=', $slug)->first();
        $panels = $project->panels;
        $features = Feature::all();
        return view('project', compact(['project', 'panels', 'features']));
    }

    public function edit(Request $request, $project_id){ 
        $project = Project::find($project_id);
        $project->name = $request->input('name');
        $project->discription = $request->input('discription');
        $project->slug = $request->input('slug');
        $project->slug = str_replace(" ", "-", $project->slug);
        $project->slug = strtolower($project->slug);
        $project->save();
        return redirect()->route('projectIndex', ['slug' => $project->slug]);
    }

    /**
     * create, creates a project and automatically generates 3 panels
     *
     * @param Request $request
     * @return view
     */
    public function create(Request $request){
        $project = new Project;
        $panel = new Panel;
        $project->name = $request->input('name');
        $project->discription = $request->input('discription');
        $project->slug = $request->input('slug');
        $project->slug = str_replace(" ", "-", $project->slug);
        $project->slug = strtolower($project->slug);
        $project->invite_link = 'invite_link';
        $project->team_id = 1;
        $project->save();
        $panel->createTemplatePanel('Product Backlog', 'Backlog', $project->id, true);
        $panel->createTemplatePanel('Sprint 1', 'Sprint', $project->id, true);
        $panel->createTemplatePanel('Suggestions', 'Suggestions', $project->id, true);
        
        return redirect()->route('projectIndex', ['slug' => $project->slug]);
    }
}
