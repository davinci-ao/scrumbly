<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;
use App\Models\Panel;

class FeatureController extends Controller
{
    public function create(Request $request, $slug)
    {
        $feature = new Feature;
        $feature->name = $request->input('name');
        $feature->description = $request->input('description');
        $feature->storypoints = $request->input('storypoint');
        $feature->status_id = 0;
        $feature->panel_id = $request->input('panel_id');
        $feature->save();

        return redirect()->route('panelIndex', ['panel_id' => $request->input('panel_id')]);
    }

    public function edit(Request $request, $slug, $feature_id){ 
        $feature = Feature::find($request->feature_id);
        $feature->name = $request->name;
        $feature->description = $request->description;
        $feature->storypoints = $request->storypoints;
        $feature->save();

        return redirect()->route('panelIndex', ['panel_id' => $request->input('panel_id')]);
    }

    public function delete(Request $request, $slug, $feature_id){
        Feature::where('id', $feature_id)->delete();
        return redirect()->route('panelIndex', ['panel_id' => $request->input('panel_id')]);
    }
}