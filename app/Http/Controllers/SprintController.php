<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;

class SprintController extends Controller
{
    public function index()
    {
        $sprints = Sprint::all();
        return view('overview', compact('sprints'));
    }

    public function push(Request $request)
    {
        $sprint = new Sprint;
        $sprint->name = $request->input('name');
        $sprint->type_id = 1;
        $sprint->status_id = 0;
        $sprint->project_id = 0;
        $sprint->save();

        return redirect()->route('projects');
    }

    public function finish(Request $request)
    {
        $sprint = Sprint::find($request->input('finishId'));
        $sprint->status_id = 1;
        $sprint->save();

        return redirect()->route('projects');
    }
}
