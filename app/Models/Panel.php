<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Features;
use DB;

class Panel extends Model
{
    use HasFactory;

    public function features(){
        return $this->hasMany(Feature::class);
    }
}
