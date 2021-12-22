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
    public function handle(Request $request, Closure $next)
    {
        $project = new Project;
        $user_id = Auth::id();
        $role = $project->find($user_id)->users;
        return $next($request);
    }
}
