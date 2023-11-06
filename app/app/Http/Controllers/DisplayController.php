<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    public function index(){
        $post = new Post;
        $eloquent =$post->with('user')->get()->toArray();        
        
        return view('timeline',[
            'posts' => $eloquent,
        ]);
    }
}
