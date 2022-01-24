<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\ProjectUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;

class RoleSystem
{
    /**
     * Handle, Check if user belongs to project
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $project_id = $request->route('project_id');
        $project = ProjectUser::select()->where('id', '=', $project_id)->where('user_id', '=', Auth::id())->get();
        
        if($project->isEmpty()){
            return redirect()->route('homepage');
        }
        return $next($request);
    }
}
