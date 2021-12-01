<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel;
use App\Models\Feature;

class PanelController extends Controller
{
    
    public function finishPanel(Request $request, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $panel->active = false;
        $panel->save();
        return redirect()->route('projectIndex', ['project_id' => $request->input('project_id')]);
    }

    public function createPanel(Request $request)
    {
        $panel = new Panel;
        $panel->name = $request->input('name');
        $panel->type = 'Sprint';
        $panel->project_id = $request->input('project_id');
        $panel->active = true;
        $panel->save();
        return redirect()->route('projectIndex', ['project_id' => $request->input('project_id')]);
    }

    public function editPanel(Request $request, $panel_id)
    {
        $panel = Panel::find($panel_id);
        $panel->name = $request->name;
        $panel->save();
        return redirect()->route('projectIndex', ['project_id' => $request->input('project_id')]);
    }

    public function deletePanel(Request $request, $panel_id){
        $panel = Panel::find($panel_id);
        $features = $panel->features;
        foreach($features as $feature){
            $feature->delete();
        }
        Panel::where('id', $panel_id)->delete();
        return redirect()->route('projectIndex', ['project_id' => $request->input('project_id')]);
    }
}
