<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class sprint extends Model
{
    use HasFactory;
    
    public function getAllSprints()
    {
      $sprintData = DB::table('lists')->where(['type_id' => 1])->get();

      return $sprintData;
    }
    public function pushToDatabase($request)
    {
        $name = $request->input('name');
        DB::table('lists')->insert([
            'name' => $name,    
            'type_id' => 1,
            'status_id' => 0
        ]);
    }
    public function finish($request)
    {
        $id = $request->input('finishId');
        DB::table('lists')->update(['status_id' => 1]);
    }
}
