<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //タイムライン表示
    public function index(){
        $post = new Post;
        $eloquent = $post->with('user')->get()->toArray();        
        
        return view('timeline',[
            'posts' => $eloquent,
        ]);
    }
    // マイページ表示
    public function mypage(){

        $user = Auth::user();
        $post = $user->posts()->with('user')->get()->toArray();
        
        return view('mypage',[
            'user' => $user,
            'posts' => $post,
        ]);
    }
}
