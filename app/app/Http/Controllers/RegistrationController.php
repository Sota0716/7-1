<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function createPostForm(){
        return view('create_post');
    }
    // 投稿登録
    public function createPost(Request $request){
        $post = new Post;
        // 画像登録
        
        

        if($request->hasFile('image')){   
            $dir = 'sample';//ディレクトリ名     
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/' . $dir, $file_name);
        }else{
            $path = null;
        }
        //投稿データ格納
        $post->spot = $request->spot;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = auth()->user()->id;
        $post->image = 'storage/' . $dir . '/' . $file_name;

        $post->save();
        return view('/create_post');
        
    }
    
}
