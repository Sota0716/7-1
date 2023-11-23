<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateComment;
use App\Http\Requests\CreatePost;
use App\Http\Requests\CreateUser;
use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use App\Models\Violation_report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{   
    //ーーーーーーーーーー違反登録ーーーーーーーーーー
    public function createReport(Post $post,Request $request){

        if(Auth::check() && Auth::id()==$post->user_id){
            return redirect()->route('share.error');
        }else{
        $reports = new Violation_report;  
            $reports->user_id = Auth::user()->id;
            $reports->post_id = $post->id;
            $reports->text = $request->text;

            $reports->save();

            return redirect('/');
        }
    }
    //ーーーーーーーーーー投稿表示ーーーーーーーーーー

    public function createPostForm(){
        if(Auth::user()->del_flg == 1 ){
            return redirect()->route('share.error');
        }else{
            return view('create_post');
        }
    }

    //ーーーーーーーーーー投稿登録ーーーーーーーーーー

    public function createPost(CreatePost $request){
        $post = new Post;
        // 画像登録
        if($request->hasFile('image')){   
            $dir = 'sample';//ディレクトリ名     
            $file_name = $request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/' . $dir, $file_name);
            $post->image = 'storage/' . $dir . '/' . $file_name;
        }else{
            $post->image = null;
        }
        //投稿データ格納
        $post->spot = $request->spot;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = auth()->user()->id;
        

        $post->save();
        return redirect('/'); 
    }
    //ーーーーーーーーーーコメント登録ーーーーーーーーーー
    public function createComment(Post $post,CreateComment $request){
        //コメントデータ格納
        $comment = new Comment;
        $comment->text = $request->comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $post->id;
        
        $comment->save();
        return redirect('/comment/'.$post->id);
    }

    //ーーーーーーーーーープロフィール編集表示ーーーーーーーーーー

    public function profileEditForm(){

        
        if(Auth::user()->del_flg == 1 ){
            return redirect()->route('share.error');
        }else{
            $user = Auth::user();
            return view('profile_edit',[
                'users' => $user
            ]);
        }
    }

    //ーーーーーーーーーープロフィール登録ーーーーーーーーーー
    
    public function profileEdit(CreateUser $request){
        
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
        
        return redirect('/mypage')->with('message', 'プロフィール編集完了');
    }
    
}
