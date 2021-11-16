<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index(){
        $projects = Project::all();
        return view('dashboard', ['projects' => $projects]);
    }
}
