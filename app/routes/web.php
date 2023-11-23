<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\DeleteController;
use App\Http\Controllers\DisplayController;
use App\Http\Controllers\EditContoroller;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/home', 'HomeController@index')->name('home');




Auth::routes();
// タイムライン
Route::get('/',[DisplayController::class,'index'])->name('timeline');
//無限スクロール
Route::post('/addpage/{page}',[DisplayController::class,'addPage']);

//エラーページ
Route::get('/share/error',[DisplayController::class,'error'])->name('share.error');
//退会完了ページ
Route::get('/share/userdelete',[DisplayController::class,'shareUserDelite'])->name('delete.user.page');
//利用停止ページ
Route::get('/stopped_user',[DisplayController::class,'stoppedUser'])->name('stopped.user');

// ログイングループ
Route::group(['middleware'=>'auth'],function(){

    //管理者
    Route::group(['middleware' => ['auth', 'can:admin_only']], function () {
        //管理者user
        Route::resource('/manager_user', 'ManagerController');
        //管理者post
        Route::resource('/manager_post', 'ManagerpostController');
    });
    
    //一般
    Route::group(['middleware' => ['auth', 'can:users']], function () {
        // タイムライン検索
        Route::post('/search',[DisplayController::class,'searchTimeline'])->name('search.timeline');    
        //コメント表示
        Route::get('/comment/{post}',[DisplayController::class,'comment'])->name('comment');
        
        // コメント登録
        Route::post('/create_comment/{post}',[RegistrationController::class,'createComment'])->name('create.comment');
        //違反報告
        Route::get('/report/{post}',[DisplayController::class,'reportForm'])->name('report.form');
        Route::post('/report/{post}',[RegistrationController::class,'createReport'])->name('create.report');
        //新規投稿
        Route::get('/create_post',[RegistrationController::class,'createPostForm'])->name('create.post.form');
        Route::post('/create_post',[RegistrationController::class,'createPost'])->name('create.post');
        
        //postポリシー
        Route::group([ 'middleware' => 'can:view,post' ],function(){        
            //投稿編集
            Route::get('/edit/{post}/post',[EditContoroller::class,'editPostForm'])->name('edit.post.form');
            //投稿編集保存
            Route::post('/edit/{post}/post',[EditContoroller::class,'editPost'])->name('edit.post');
            //投稿消去
            Route::post('/delete/{post}/post',[DeleteController::class,'deletePost'])->name('delete.post');
        });

        //マイページ表示
        Route::get('/mypage',[DisplayController::class,'mypage'])->name('mypage');
        //マイページコメントした投稿のみ表示
        Route::get('/mypage/comment',[DisplayController::class,'mypageComment'])->name('mypage.comment');
        //プロフィール編集
        Route::get('/profile_edit',[RegistrationController::class,'profileEditForm'])->name('profile.edit.form');
        Route::post('/profile_edit',[RegistrationController::class,'profileEdit'])->name('profile.edit');
        //退会
        Route::post('/profile_edit/delete{user}',[DeleteController::class,'deleteUser'])->name('delete.user');
        //他ユーザーページ表示
        Route::get('/user/page/{post}',[DisplayController::class,'usersPage'])->name('users.page');
    });
});


    

