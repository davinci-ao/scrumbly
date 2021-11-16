<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;
use App\Models\Feature;

class ProjectsController extends Controller
{
    public function index()
    {
        $sprints = Sprint::all();
        $features = Feature::all();
        return view('overview', compact('sprints'), compact('features'));
    }
}
