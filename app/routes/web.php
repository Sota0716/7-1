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

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\EditContoroller;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//管理者処理
Route::resource('/manager_user', 'ManagerController');
Route::resource('/manager_post', 'ManagerpostController');
// タイムライン
Route::get('/',[DisplayController::class,'index'])->name('timeline');
// コメント登録
Route::post('/create_comment/{post}',[RegistrationController::class,'createComment'])->name('create.comment');
//違反報告
Route::get('/report/{post}',[DisplayController::class,'reportForm'])->name('report.form');
Route::post('/report/{post}',[RegistrationController::class,'createReport'])->name('create.report');
//新規投稿
Route::get('/create_post',[RegistrationController::class,'createPostForm'])->name('create.post.form');
Route::post('/create_post',[RegistrationController::class,'createPost'])->name('create.post');
//投稿編集
Route::get('/edit/{post}/post',[EditContoroller::class,'editPostForm'])->name('edit.post.form');
//投稿保存
Route::post('/edit/{post}/post',[EditContoroller::class,'editPost'])->name('edit.post');

//マイページ表示
Route::get('/mypage',[DisplayController::class,'mypage'])->name('mypage');
//マイページコメントした投稿のみ表示
Route::get('/mypage/comment',[DisplayController::class,'mypageComment'])->name('mypage.comment');
//プロフィール編集
Route::get('/profile_edit',[RegistrationController::class,'profileEditForm'])->name('profile.edit.form');
Route::post('/profile_edit',[RegistrationController::class,'profileEdit'])->name('profile.edit');

//他ユーザーページ表示
Route::get('/user/page/{post}',[DisplayController::class,'usersPage'])->name('users.page');

