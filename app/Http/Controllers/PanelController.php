<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel;
use App\Models\Feature;

class PanelController extends Controller
{

    /**
     * panelIndex, returns the panel page
     *
     * @param [int] $panel_id
     * @return void
     */
    public function panelIndex($panel_id){
        $panel = Panel::find($panel_id);
        $features = $panel->features;
        $project_id = $panel->project_id;

        return view('panel', compact(['panel', 'features', 'project_id']));
    }

    /**
     * finish, changes the panel from active to archived by changing active to false
     *
     * @param Request $request
     * @param [int] $panel_id
     * @return view
     */
    public function finish(Request $request, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $panel->active = false;
        $panel->save();
    
        return redirect()->route('projectIndex', ['slug' => $request->input('project_slug')]);
    }

    /**
     * create, creates a panel
     *
     * @param Request $request
     * @return view
     */

    public function create(Request $request)
    {
        $panel = new Panel;
        $panel->name = $request->input('name');
        $panel->type = 'Sprint';
        $panel->project_id = $request->input('project_id');
        $panel->active = true;
        $panel->save();

        return redirect()->route('projectIndex', ['slug' => $request->input('project_slug')]);
    }

    /**
     * edit, edits a panel
     *
     * @param Request $request
     * @param [int] $panel_id
     * @return view
     */
    public function edit(Request $request, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $panel->name = $request->name;
        $panel->save();

        return redirect()->route('projectIndex', ['slug' => $request->input('project_slug')]);
    }

    /**
     * delete, deletes a panel
     *
     * @param Request $request
     * @param [int] $panel_id
     * @return view
     */
    public function delete(Request $request, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $features = $panel->features;
        foreach($features as $feature){
            $feature->delete();
        }
        Panel::where('id', $panel_id)->delete();
        
        return redirect()->route('projectIndex', ['slug' => $request->input('project_slug')]);
    }
}
