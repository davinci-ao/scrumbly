<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RoleSystem
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        $projects = Project::find($request->route()->parameters('project_id'));
        if($projects != null) {  
            $project = $projects->first();
            $user_id = Auth::id();
            $user_role_ids = $project->users->toArray();
            $role_ids = [];
            foreach($user_role_ids as $user_role_id)
            {
                $role_ids[] = $user_role_id['pivot']['role_id'];
            }
            dd($role_ids);
            foreach($roles as $role) {  //roles = ["developer", "scrummaster"] via route file
                foreach($user_role_ids as $user_role_id) {  // $user_role_ids = [1,2] from pivot table
                    $user_role_name = Role::find($user_role_id);
                    if($userRole == $role) {
                        // return on first match
                        return $next($request);
                    }
                }  
            }
        }
        // on the given project, none of the required roles is found
        return redirect()->route('access_denied')->with('error', 'you are not authorized as .... for project .... ');
            

    }
}
