<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //ーーーーーーーーーー タイムライン表示 ーーーーーーーーーー 
       
    public function index(){

        if(Auth::check()&&Auth::user()->role == 0){
            //管理者
            return redirect()->route('manager.index');

        }else{
            //通常
            $post = new Post;
            $eloquent = $post->with('user','comment')->orderBy('created_at', 'desc')->get()->toArray(); 
            $comment = new Comment;
            $comment = $comment->with('user')->get()->toArray();
            
            return view('timeline',[
                'posts' => $eloquent,
                'comments' =>$comment
            ]);  
        } 
    }

    //ーーーーーーーーーー マイページ表示 ーーーーーーーーーー

    public function mypage(){
        $user = Auth::user();
        $post = $user->posts()->with('user')->get()->toArray();
        $comment = new Comment;
        $comment = $comment->with('user')->get()->toArray();
        
        return view('mypage',[
            'user' => $user,
            'posts' => $post,
            'comments' =>$comment,
        ]);
    }

    //ーーーーーーーーーー マイページコメントした投稿 ーーーーーーーーーー

    public function mypageComment(){
        $user = Auth::user();

        // コメントした投稿取得
        $posts = Comment::select('post_id') 
        ->with('post.user')->where('user_id', $user->id)->distinct()->get()->toArray();                
        
        // コメント表示 
        $comments = Comment::with('user')->get()->toArray();
        
        return view('mypage_comment',[
            'user' => $user,
            'posts' => $posts,
            'comments' =>$comments,
        ]);
    }

    //ーーーーーーーーーー ユーザーページ表示 ーーーーーーーーーー

    public function usersPage(Post $post){
        // ログインかつ自身クリックの場合マイページ表示
        if(Auth::check() && Auth::id() == $post->user_id ){
            return redirect('/mypage');

        }else{
        //他ユーザーページへ    
            $userid = $post->user_id;
            $post = $post->with('user')->where('user_id',$userid)->get()->toArray();
            $comment = new Comment;
            $comment = $comment->with('user')->get()->toArray();
            
            return view ('users_page',[
                'posts'  => $post,
                'comments' =>$comment,
            ]);
        }    
    }
    //ーーーーーーーーーー 違反報告表示 ーーーーーーーーーー

    public function reportForm(Post $post){
        
        return view('report',[
            'post'=>$post,
        ]);        
    }

}
