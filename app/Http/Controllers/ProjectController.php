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
     * @param [int] $project_id
     * @return view
     */
    public function projectIndex($project_id){
        $project = Project::find($project_id);
        $panels = $project->panels;
        $features = Feature::all();

        return view('overview', compact(['project', 'panels', 'features']));
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
        $project->description= $request->input('description');
        $project->invite_link = 'invite_link';
        $project->team_id = 1;
        $project->save();
        $panel->createTemplatePanel('Product Backlog', 'Backlog', $project->id, true);
        $panel->createTemplatePanel('Sprint 1', 'Sprint', $project->id, true);
        $panel->createTemplatePanel('Suggestions', 'Suggestions', $project->id, true);
        
        return redirect()->route('projectIndex', ['project_id' => $project->id]);
    }
}
