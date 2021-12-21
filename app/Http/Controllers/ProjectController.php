<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Panel;
use App\Models\Feature;

class ProjectController extends Controller
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function index()
    {
        $projects = Project::all();

        return view('homepage', ['projects' => $projects]);
    }

    public function projectIndex($project_id){
        $project = Project::find($project_id);
        $panels = $project->panels;
        $features = Feature::all();

        return view('overview', compact(['project', 'panels', 'features']));
    }

    public function create(Request $request){
        $project = new Project;
        $panel = new Panel;
        $project->name = $request->input('name');
        $project->discription = $request->input('discription');
        $project->invite_link = 'invite_link';
        $project->team_id = 1;
        $project->save();
        $panel->createTemplatePanel('Product Backlog', 'Backlog', $project->id, true);
        $panel->createTemplatePanel('Sprint 1', 'Sprint', $project->id, true);
        $panel->createTemplatePanel('Suggestions', 'Suggestions', $project->id, true);
        
        return redirect()->route('projectIndex', ['project_id' => $project->id]);
    }
}
