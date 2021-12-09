<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function createFeature(Request $request)
    {
        $feature = new Feature;
        $feature->name = $request->input('name');
        $feature->description = $request->input('description');
        $feature->storypoints = $request->input('storypoint');
        $feature->status_id = 0;
        $feature->panel_id = 1;
        $feature->save();
        return redirect()->route('projectIndex', ['project_id' => $request->input('project_id')]);
    }

    public function editFeature(Request $request, $feature_id){ 
        $feature = Feature::find($request->feature_id);
        $feature->name = $request->name;
        $feature->description = $request->description;
        $feature->storypoints = $request->storypoints;
        $feature->save();
        return redirect()->route('projectIndex', ['project_id' => $request->input('project_id')]);
    }

    public function deleteFeature(Request $request,  $feature_id){
        Feature::where('id', $feature_id)->delete();
        return redirect()->route('projectIndex', ['project_id' => $request->input('project_id')]);
    }
}