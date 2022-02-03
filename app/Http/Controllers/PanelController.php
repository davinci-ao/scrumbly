<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Panel;
use App\Models\Feature;

class PanelController extends Controller
{

    /**
     * panelIndex, returns the panel page
     *
     * @param [string] $slug
     * @param [int] $panel_id
     * @return void
     */
    public function panelIndex($slug, $panel_id){
<<<<<<< HEAD
        $project = Project::where('slug', '=', $slug)->first();
=======
>>>>>>> dev
        $panel = Panel::find($panel_id);
        $features = $panel->features;
        $project_id = $panel->project_id;

        return view('panel', compact(['panel', 'features', 'project']));
    }

    /**
     * finish, changes the panel from active to archived by changing active to false
     *
     * @param Request $request
     * @param [string] $slug
     * @param [int] $panel_id
     * @return view
     */
    public function finish(Request $request, $slug, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $panel->active = false;
        $panel->save();
    
        return redirect()->route('projectIndex', $slug);
    }

    /**
     * create, creates a panel
     *
     * @param Request $request
     * @param [string] $slug
     * @return view
     */

    public function create(Request $request, $slug)
    {
        $project = Project::where('slug', '=', $slug)->first();
        $panel = new Panel;
        $panel->name = $request->input('name');
        $panel->type = 'Sprint';
        $panel->project_id = $project->id;
        $panel->active = true;
        $panel->save();

        return redirect()->route('projectIndex',  $slug);
    }

    /**
     * edit, edits a panel
     *
     * @param Request $request
     * @param [string] $slug
     * @param [int] $panel_id
     * @return view
     */
    public function edit(Request $request, $slug, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $panel->name = $request->name;
        $panel->save();

        return redirect()->route('projectIndex', $slug);
    }

    /**
     * delete, deletes a panel
     *
     * @param Request $request
     * @param [string] $slug
     * @param [int] $panel_id
     * @return view
     */
    public function delete(Request $request, $slug, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $features = $panel->features;
        foreach($features as $feature){
            $feature->delete();
        }
        Panel::where('id', $panel_id)->delete();
        
        return redirect()->route('projectIndex', $slug);
    }
}
