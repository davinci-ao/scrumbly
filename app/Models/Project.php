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

    public function projectusers()
    {
        return $this->hasMany(ProjectUser::class);
    }
}