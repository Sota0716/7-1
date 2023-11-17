<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Violation_report extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    } 
    public function post(){
        return $this->belongsTo('App\Models\Post','post_id','id');
    } 
}
