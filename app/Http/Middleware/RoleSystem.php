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
        $project = ProjectUser::where([['project_id', $project_id], ['user_id', Auth::id()]])->get();

        if($project->isEmpty()){
            return redirect()->route('homepage')->with('message', 'U bent niet lid van dit project, of er is geen project met deze slug gevonden. Als u denkt dat dit een error is, dan heeft u pech.');
        }
        return $next($request);
    }
}
