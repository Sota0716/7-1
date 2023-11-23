<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeleteController extends Controller
{
    //ーーーーーーーーーー投稿消去ーーーーーーーーーー
    public function deletePost(Post $post){
        $post->violation_report()->delete();
        $post ->comment()->delete();
        $post -> delete();
        return redirect()->route('mypage');
    }
    //ーーーーーーーーーー退会ーーーーーーーーーー

    public function deleteUser(User $user){
        // ログインしているユーザーを取得
    $loggedInUser = Auth::user();

    // ユーザーとその関連する投稿を削除
    if ($loggedInUser && $loggedInUser->id === $user->id) {
        // ログインしているユーザーが指定されたユーザーと一致する場合
        $user->violation_report()->delete();
        $user->comment()->delete();
        $user->posts()->delete();
        $user->delete();
        
        // 退会完了ページへ
        return redirect()->route('delete.user.page');
    } else {
        // ログインしているユーザーが指定されたユーザーと一致しない場合
        return redirect()->route('share.error');
    }
}
}
