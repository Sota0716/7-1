<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{   
    //ーーーーーーーーーー 無限スクロール ーーーーーーーーーー
    public function addPage(Request $request){  
        $maxdata =Post::where('del_flg','0')->count();
        
        $skip=$request->page;
        $skip=$skip*5;
        if($maxdata > 5){
        $data = Post::with('user','comment')->orderBy('created_at', 'desc')->skip($skip)->take(5)->where('del_flg','0')->get()->toArray();
        }else{
            $data=null;
        }
        if(!is_null($data)){
            return response()->json($data);
        }
    }

    //ーーーーーーーーーー タイムライン表示 ーーーーーーーーーー 
       
    public function index(){

        if(Auth::check()&&Auth::user()->role == 0){
            //管理者
            return redirect()->route('manager_user.index');

        }elseif(Auth::check()&&Auth::user()->del_flg == 1){

            return view('stopped_user');

        }else{
            //通常
            $post = new Post;
            $eloquent = $post
            ->with('user','comment')->orderBy('created_at', 'desc')->take(5)->where('del_flg','0')->get()->toArray(); 
            return view('timeline',[
                'posts' => $eloquent,
            ]);  
        } 
    }
    //ーーーーーーーーーー 投稿検索 ーーーーーーーーーー
    public function searchTimeline(Request $request){

        if(Auth::check()&&Auth::user()->role == 0){
            //管理者
            return redirect()->route('manager_user.index');

        }elseif(Auth::check()&&Auth::user()->del_flg == 1){

            return view('stopped_user');

        }else{
            //検索機能
            $date = $request->input('date');
            $keyword = $request->input('keyword');

            $post = Post::where(function ($q) use ($keyword) {
                $q->where('spot', 'LIKE', "%$keyword%")
                  ->orWhere('title', 'LIKE', "%$keyword%")
                  ->orWhere('text', 'LIKE', "%$keyword%");
            })
            ->when($date, function ($q) use ($date) {
                $q->whereDate('created_at', '>=', $date);
            })
            ->where('del_flg','0')
            ->with('user','comment')->get()->toArray();  
            
            return view('search_timeline',[
                'posts' => $post,
                'date' =>$date,
                'keyword' =>$keyword,
            ]);  
        } 
    }

    //ーーーーーーーーーー コメント表示 ーーーーーーーーーー
    public function comment(Post $post){

        if($post->del_flg==1 ||Auth::user()->del_flg == 1){
            return redirect()->route('share.error');
        }else{
            $post = $post->with('user')->where('id',$post->id)->get()->toArray();
            $comment = new Comment;
            $comment = $comment->with('user')->get()->toArray();
                
            return view('comment',[
                'posts' => $post,
                'comments' =>$comment
            ]);
        }
        
    }

    //ーーーーーーーーーー マイページ表示 ーーーーーーーーーー

    public function mypage(){
        if(Auth::user()->del_flg == 1){
            return redirect()->route('share.error');
        }else{    
            $user = Auth::user();
            $post = $user->posts()->with('user')->orderBy('created_at', 'desc')->where('del_flg','0')->get()->toArray();
            $comment = new Comment;
            // $comment = $comment->with('user')->get()->toArray();
            
            return view('mypage',[
                'user' => $user,
                'posts' => $post,
                // 'comments' =>$comment,
            ]);
        }    
    }   

    //ーーーーーーーーーー マイページコメントした投稿 ーーーーーーーーーー

    public function mypageComment(){
        if(Auth::user()->del_flg == 1){
            return redirect()->route('share.error');
        }else{
            $user = Auth::user();

            // コメントした投稿取得
                    
            $posts = Comment::select('post_id')
                ->with(['post' => function($query) {
                    $query->where('del_flg', '0')->with('user');
                }])
                ->where('user_id', $user->id)
                ->distinct()
                ->get()
                ->toArray();
                
            // コメント表示 
            $comments = Comment::with('user')->get()->toArray();
            
            return view('mypage_comment',[
                'user' => $user,
                'posts' => $posts,
                'comments' =>$comments,
            ]);
        }
    }

    //ーーーーーーーーーー ユーザーページ表示 ーーーーーーーーーー

    public function usersPage(Post $post){
        // ログインかつ自身クリックの場合マイページ表示
        if(Auth::check() && Auth::id() == $post->user_id ){
            return redirect('/mypage');

        }elseif(Auth::user()->del_flg == 1){
            return redirect()->route('share.error');

        }else{
        //他ユーザーページへ    
            $userid = $post->user_id;
            $post = $post->with('user')->where('del_flg','0')->where('user_id',$userid)->get()->toArray();
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
        if(Auth::check() && Auth::id()==$post->user_id || $post->del_flg==1 || Auth::user()->del_flg == 1 ){
            return redirect()->route('share.error');
        }else{
            return view('report',[
                'post'=>$post,
            ]);
        }        
    }
    //ーーーーーーーーーー エラーページ ーーーーーーーーーー
    public function error(){
        
        return view('error');        
    }
    //ーーーーーーーーーー 退会完了ーページ ーーーーーーーーーー
    public function shareUserDelite(){
        return view('delete_user');        
    }
    //ーーーーーーーーーー 利用停止ーページ ーーーーーーーーーー
    public function stoppedUser(){
        return view('stopped_user');   
    }
}
