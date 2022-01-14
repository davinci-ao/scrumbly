<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Sprint;
use App\Models\User;
use DB;

class Project extends Model
{
    use HasFactory;

    public function panels(){
        return $this->hasMany(Panel::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'project_role_user', 'id', 'user_id')->withPivot('role_id', 'project_id');
    }

    public function currentUserRoles()
    {
        $current_user_id = Auth::id();
        if($current_user_id == null) {
            // niet ingelogd
            return [];
        }
        $project_id = $this->id;
        if($project_id == null) {
            // geen instance van project. statisch aangeroepen?
            return [];
        }
        $results = DB::table('project_role_user')->select('role_id')->where([['user_id', "=", $current_user_id], ['project_id', '=', $project_id]]);
        if($results == null) {
            // geen roles
            return [];
        }
        return $results;
    }
}