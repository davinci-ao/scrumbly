<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Panel;
use App\Models\Feature;
use App\Models\ProjectUser;
use App\Models\User;
use App\Models\Roles;
use Auth;
use Validator;

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

    /**
     * projectIndex, collects all the projects and returns to the project page
     *
     * @param [string] $slug
     * @return view
     */
    public function projectIndex($slug){
        $project = Project::where('slug', '=', $slug)->first();
        if(!$project){
            return redirect()->route('homepage');
        }
        $panels = $project->panels;
        $features = Feature::all();
        $role = ProjectUser::where([['project_slug', $slug], ['user_id', Auth::id()]])->value('role_id');
        $member_id = Projectuser::where('project_id', $project->id)->pluck('user_id');
        $members = User::whereIn('id', $member_id)->get();
        $allRoles = Roles::all();
        foreach($members as $member){
            $role_id = ProjectUser::where('user_id', $member->id)->value('role_id');
            $role_name = Roles::where('id', $role_id)->value('name');
            $member->role_id = $role_id;
            $member->role = $role_name;
        }

        return view('project', compact(['project', 'panels', 'features', 'role', 'members', 'allRoles']));
    }

    /**
     * used to edit the values in a project
     *
     * @param Request $request
     * @param [int] $project_id
     * @return view
     */
    public function edit(Request $request, $project_id){ 
        $rules = [
            'name'    => 'required',
            'slug'    => 'required | unique:projects',
        ];

        $data = [
            'slug.unique' => 'This slug has already been taken.',
        ];

        $validate = Validator::make($request->all(),$rules,$data);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors())->withInput(); // does not show error
        }

        $project = Project::find($project_id);
        $project->name = $request->input('name');
        $project->description = $request->input('description');
        $project->slug = $request->input('slug');
        $project->slug = str_replace(" ", "-", $project->slug);
        $project->slug = strtolower($project->slug);
        $project->save();


        $projectUsers = ProjectUser::where('project_id', $project->id)->get();
        foreach($projectUsers as $projectUser){
            $projectUser->project_slug = $project->slug;
            $projectUser->save();
        }

        return redirect()->route('projectIndex', ['slug' => $project->slug]);
    }

    /**
     * create, creates a project and automatically generates 3 panels
     *
     * @param Request $request
     * @return view
     */
    public function create(Request $request){
        $rules = [
            'name'    => 'required',
            'slug'    => 'required | unique:projects',
        ];

        $data = [
            'slug.unique' => 'This slug has already been taken.',
        ];

        $validate = Validator::make($request->all(),$rules,$data);

        if($validate->fails())
        {
            return redirect()->back()->withErrors($validate->errors())->withInput(); // does not show error
        }
        
        $project = new Project;
        $project->name = $request->input('name');
        $project->description= $request->input('description');
        $project->slug = $request->input('slug');
        $project->slug = str_replace(" ", "-", $project->slug);
        $project->slug = strtolower($project->slug);
        $project->invite_link = 'invite_link';
        $project->team_id = 1;
        $project->save();
        
        $projectUser = new ProjectUser;
        $projectUser->project_id = $project->id;
        $projectUser->project_slug = $project->slug;
        $projectUser->user_id = Auth::id();
        $projectUser->role_id = '4';
        $projectUser->save();

        $panel = new Panel;
        $panel->createTemplatePanel('Product Backlog', 'Backlog', $project->id, true);
        $panel->createTemplatePanel('Sprint 1', 'Sprint', $project->id, true);
        $panel->createTemplatePanel('Suggestions', 'Suggestions', $project->id, true);

        return redirect()->route('projectIndex', ['slug' => $project->slug]);
    }
    
    /**
     * no one knows what the purpose is
     *
     * @param [int] $project_id
     * @return view
     */
    public function user($project_id)
    {
        $project_user = new Projectuser;
        $user_id = Auth::user()->id;

        $project_user->user_id = $user_id;
        $project_user->project_id = $project_id;
        $project_user->save();
    }
}
