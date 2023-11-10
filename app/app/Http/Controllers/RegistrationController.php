<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    //ーーーーーーーーーー投稿表示ーーーーーーーーーー

    public function createPostForm(){
        return view('create_post');
    }

    //ーーーーーーーーーー投稿登録ーーーーーーーーーー

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
        return redirect('/'); 
    }

    //ーーーーーーーーーープロフィール編集表示ーーーーーーーーーー

    public function profileEditForm(){
        $user = Auth::user();


        return view('profile_edit',[
            'users' => $user
        ]);
    }

    //ーーーーーーーーーープロフィール登録ーーーーーーーーーー
    
    public function profileEdit(Request $request){
        $user = Auth::user();
        // 画像登録
        if($request->hasFile('image')){   
            $dir = 'icons';//ディレクトリ名     
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/' . $dir, $file_name);
            $user->image = 'storage/' . $dir . '/' . $file_name;
        }else{
            $path = null;
        }
        //プロフィールデータ格納
        $columns =['name','email','spot','profile'];
        foreach($columns as $column){
            $user->$column = $request->$column;
        }
        $user->save();
        
        return redirect('mypage');
    }
    
}
