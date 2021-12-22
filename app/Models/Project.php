<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Sprint;
use App\Models\User;

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
}