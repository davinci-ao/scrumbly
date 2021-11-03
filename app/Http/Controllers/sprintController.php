<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sprint;
 
class sprintController extends Controller
{

    public function push(Request $request)
    {
        $sprint = new sprint;
        $sprint->pushToDatabase($request);
        return redirect()->route('projects');
    }

    public function finish(Request $request)
    {
        $sprint = new sprint;
        $sprint->finish($request);
        return redirect()->route('projects');
    }
}
