<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Panel;
use App\Models\Feature;

class PanelController extends Controller
{
    //
    public function push(Request $request)
    {
        $panel = new Panel;
        $panel->name = $request->input('name');
        $panel->type_id = 1;
        $panel->status_id = 0;
        $panel->project_id = $request->input('project_id');
        $panel->save();
        return redirect()->route('projectOverview', ['project_id' => $request->input('project_id')]);
    }

    public function finish(Request $request)
    {
        $panel = Panel::find($request->input('panel_id'));
        $panel->status_id = 1;
        $panel->save();
        return redirect()->route('projectOverview', ['project_id' => $request->input('project_id')]);
    }

    public function delete(Request $request, $panel_id){
        $panel = Panel::find($panel_id);
        $features = $panel->features;
        foreach($features as $feature){
            $feature->delete();
        }
        Panel::where('id', $panel_id)->delete();
        return redirect()->route('projectOverview', ['project_id' => $request->input('project_id')]);
    }
}
