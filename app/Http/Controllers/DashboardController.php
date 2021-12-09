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

    public function edit(Request $request, $user_id){
        $request->all();  
        $user = User::find($user_id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        
        return redirect()->route('userlist');
    }

    public function delete($user_id)
    {
        User::where('id', $user_id)->delete();
        
        return redirect()->route('userlist');
    }
}
