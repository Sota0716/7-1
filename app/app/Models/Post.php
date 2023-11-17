<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this ->belongsTo('App\Models\User','user_id','id');
    }
    public function comment(){
        return $this ->hasMany('App\Models\Comment','post_id', 'id');
    }
    public function violation_report(){
        return $this ->hasMany('App\Models\Violation_report');
    }
}
