<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Panel;
use App\Models\Feature;
use App\Models\ProjectUser;
use Auth;

class ProjectController extends Controller
{
    /**
     * index, displays your projects in homepage
     *
     * @return view
     */
    public function index()
    {
        $project_ids = ProjectUser::select('project_id')->where('user_id', Auth::id())->get();
        $projects = Project::whereIn('id', $project_ids)->get();
        
        return view('homepage', ['projects' => $projects]);
    }

    public function projectIndex($project_id){
        $project = Project::find($project_id);
        $panels = $project->panels;
        $features = Feature::all();
        return view('overview', compact(['project', 'panels', 'features']));
    }

    public function user($project_id)
    {
        $project_user = new Projectuser;
        $user_id = Auth::user()->id;

        $project_user->user_id = $user_id;
        $project_user->project_id = $project_id;
        $project_user->save();
    }
}
