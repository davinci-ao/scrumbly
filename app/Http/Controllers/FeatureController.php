<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function push(Request $request)
    {
        $feature = new Feature;
        $feature->name = $request->input('name');
        $feature->description = $request->input('description');
        $feature->storypoints = $request->input('storypoint');
        $feature->status_id = 0;
        $feature->list_id = 0;
        $feature->save();

        return redirect()->route('projects');
    }

    public function editFeature(Request $request, $feature_id){
        $request->all();  
        $feature = Feature::find($request->feature_id);
        $feature->name = $request->name;
        $feature->description = $request->description;
        $feature->storypoints = $request->storypoints;
        $feature->save();
        return redirect()->route('projects');
    }

    public function deleteFeature($feature_id){
        Feature::where('id', $feature_id)->delete();
        return redirect()->route('projects');
    }
}