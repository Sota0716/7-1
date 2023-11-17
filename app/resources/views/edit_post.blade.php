@extends('layouts.head')
@section('content')
    <!-- ーーーーーーーーーー投稿編集ーーーーーーーーーー -->

<div class="w-100 py-4 share-flex-column-center py-5">
    <!-- 投稿BOX -->
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"></div>
        <div class="col h1">投稿編集</div>
    </div>
    <form action="{{ route('edit.post',['post' => $posts['id'] ]) }}" method="post" enctype="multipart/form-data" class="w-75 row share-timeline-post-box border border-1 rounded share-bg shadow">
    @csrf
        <!-- 投稿左部分 -->
        
        <div class="col-sm">
            <div class="d-flex align-items-center share-height-90">
                <!-- アイコン -->
                <a class="rounded-circle share-post-icon d-flex align-items-center justify-content-center" href="">
                    <img src="{{ asset(Auth::user()->image) }}" alt="">
                </a>
                <!-- 留学地域 -->
                <input class="ml-5 share-fontsize1"  type="text" name="spot" placeholder="留学地" value="{{ $posts['spot'] }}">
                
            </div>
            <!-- 投稿画像 -->
            <div class="share-post-img mt-5">
                <img class="share-box52" src="{{ asset( $posts['image'] ) }}" alt="">
            </div>
            <div class="">
                <input class="mt-4" type="file" name="image" >
            </div>    
            
            
        </div>
        <!-- 投稿右部分 -->
        <div  class="col-sm w-100 h-100">
            <div class="w-100 mt-5 d-flex justify-content-center">
                <!-- タイトル -->
                <div class="share-fontsize2">
                    <input type="text" name="title" placeholder="タイトル" value="{{ $posts['title'] }}">
                </div>
            </div>
            <div class="mt-3  share-post-text">
                <textarea class="form-control h-100 " name="text">{{ $posts['text'] }}</textarea>
            </div>
        </div>
        <div class="w-100 d-flex justify-content-around py-4">
            <button type='submit' class="btn btn-primary btn-lg" onclick='return confirm("編集しますか？")'>編集完了</button>
            
            <button type='' class="btn btn-danger btn-lg" onclick='return confirm("消去しますか？")'>消去</button>
        </div>
    </form>
 
</div>
@endsection