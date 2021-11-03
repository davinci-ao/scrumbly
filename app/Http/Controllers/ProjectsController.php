<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;

class ProjectsController extends Controller
{
    public function index()
    {
        $sprints = Sprint::all();

        return view('overview', compact('sprints'));
    }
}
