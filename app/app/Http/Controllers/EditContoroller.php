<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditContoroller extends Controller
{

    //ーーーーーーーーーー投稿編集ーーーーーーーーーー

    public function editPostForm(Post $post){

    return view('edit_post',[
        'posts' => $post,
    ]);
    }

    //ーーーーーーーーーー投稿編集-保存ーーーーーーーーーー

    public function editPost(Post $post,Request $request){
        // 画像登録
        if($request->hasFile('image')){   
            $dir = 'sample';//ディレクトリ名     
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/' . $dir, $file_name);
            $post->image = 'storage/' . $dir . '/' . $file_name;
        }
        //投稿データ格納
        $post->spot = $request->spot;
        $post->title = $request->title;
        $post->text = $request->text;
        
        $post->save();

        return redirect()->route('mypage')->with('message', '投稿編集完了'); 
    }
}
