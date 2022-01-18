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

    /**
     * createPanelTemplate, generates panels when creating a new project
     *
     * @param [string] $name
     * @param [string] $type
     * @param [int] $project_id
     * @param [boolean] $active
     * @return void
     */
    public function createTemplatePanel($name, $type, $project_id, $active)
    {
        $panel = new Panel;
        $panel->name = $name;
        $panel->type = $type;
        $panel->project_id = $project_id;
        $panel->active = $active;
        $panel->save();
    }
}
