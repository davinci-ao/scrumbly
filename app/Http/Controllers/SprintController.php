<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;
use App\Models\Feature;

class SprintController extends Controller
{    

    public function push(Request $request)
    {
        $sprint = new Sprint;
        $sprint->name = $request->input('name');
        $sprint->type_id = 1;
        $sprint->status_id = 0;
        $sprint->project_id = $request->input('project_id');
        $sprint->save();
        return redirect()->route('projectOverview', ['project_id' => $request->input('project_id')]);
    }

    public function finish(Request $request)
    {
        $sprint = Sprint::find($request->input('sprint_id'));
        $sprint->status_id = 1;
        $sprint->save();
        return redirect()->route('projectOverview', ['project_id' => $request->input('project_id')]);
    }

    public function delete(Request $request, $sprint_id){
        $sprint= Sprint::find($sprint_id);
        $features = $sprint->features;
        dd($features);
        $features->delete();
        Sprint::where('id', $sprint_id)->delete();
        return redirect()->route('projectOverview', ['project_id' => $request->input('project_id')]);
    }
}
