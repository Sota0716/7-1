<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this ->belongsTo('App\Models\User');
    }
    public function comment(){
        return $this ->belongsTo('App\Models\Comment');
    }
    public function violation_report(){
        return $this ->belongsTo('App\Models\Violation_report');
    }
}
