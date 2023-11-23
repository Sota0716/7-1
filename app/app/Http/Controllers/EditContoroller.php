<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditContoroller extends Controller
{

    //ーーーーーーーーーー投稿編集ーーーーーーーーーー

    public function editPostForm(Post $post){
        if($post->del_flg==1){
            return redirect()->route('share.error');
        }else{
            return view('edit_post',[
                'posts' => $post,
            ]);
        }    
    }

    //ーーーーーーーーーー投稿編集-保存ーーーーーーーーーー

    public function editPost(Post $post,CreatePost $request){
        // 画像登録
        
        if($request->deliteimage==1&& !is_null($post->image)){ 

            Storage::delete($post->image);
            
            $post->image =null;
            
        }elseif($request->hasFile('image')){
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
