<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;

class projectsController extends Controller
{
    public function index()
    {  
        $sprint = new sprint;
        $sprintData = $sprint->getAllSprints();
        return view('overview', ['sprintData' => $sprintData]);
    }
}
