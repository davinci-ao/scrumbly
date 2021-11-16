<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Feature;

class FeatureController extends Controller
{
    public function add()
    {
        
    }

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
}