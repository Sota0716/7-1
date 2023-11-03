<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index(){
        $post = new Post;
        $eloquent =$post->all()->toArray();
        
        return view('timeline',[
            'posts' => $eloquent,
        ]);
    }
}
