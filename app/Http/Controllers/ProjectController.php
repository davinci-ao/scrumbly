<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Panel;
use App\Models\Feature;
use Validator;

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
     * @param [string] $slug
     * @return view
     */
    public function projectIndex($slug){
        $project = Project::where('slug', '=', $slug)->first();
        if($project == null){
            return redirect()->route('homepage');
        }
        $panels = $project->panels;
        $features = Feature::all();
        
        return view('project', compact(['project', 'panels', 'features']));
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
        if($request->input('slug'))
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
        $panel = new Panel;
        $project->name = $request->input('name');
        $project->description= $request->input('description');
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
