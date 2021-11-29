<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('userlist', ['users' => $users]);
    }

    public function edit()
    {

    }

    public function delete($id)
    {
        User::where('id', $id)->delete();
        
        $users = User::all();
        return view('userlist', ['users' => $users]);
    }
}
