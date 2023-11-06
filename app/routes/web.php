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
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Route;





Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// タイムライン
Route::get('/',[DisplayController::class,'index']);
//新規投稿
Route::get('/create_post',[RegistrationController::class,'createPostForm']);
Route::post('/create_post',[RegistrationController::class,'createPost']);
//プロフィール編集
Route::get('/profile_edit',[RegistrationController::class,'profileEditForm']);
Route::post('/profile_edit',[RegistrationController::class,'profileEdit'])->name('profile.edit');