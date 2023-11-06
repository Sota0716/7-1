@extends('layouts.head')
@section('content')

<!-- ーーーーーーーーーー新規投稿ーーーーーーーーーー -->

<div class="container-fluid d-flex justify-content-center py-5">
    <!-- 投稿BOX -->
    
    <form action="{{ route('profile.edit') }}" method="post" enctype="multipart/form-data" class="row share-timeline-post-box border border-1 rounded share-bg">
    @csrf
        <!-- 投稿左部分 -->
        
        <div class="col-6">
            <div class="d-flex align-items-center share-height-90">
                <!-- アイコン -->
                <a class="rounded-circle share-post-icon" href=""><img src="" alt=""></a>
                <!-- 留学地域 -->
                <div class="ml-5 share-fontsize1">
                    <input type="text" name="spot" placeholder="留学地" autofocus>
                </div>
            </div>
            <!-- 投稿画像 -->
            <div class="mt-5 share-post-img">
            
            </div>
            <input type="file" name="image">
            
            
        </div>
        <!-- 投稿右部分 -->
        <div  class="col-6 w-100 h-100">
            <div class="w-100 mt-5 d-flex justify-content-center">
                <!-- タイトル -->
                <div class="share-fontsize2">
                    <input type="text" name="title" placeholder="タイトル">
                </div>
            </div>
            <div class="mt-3  share-post-text">
                <textarea class="form-control h-100 " name="text"></textarea>
            </div>
        </div>
        <div class="col d-flex justify-content-center py-4">
            <button type='submit' class="btn btn-primary btn-lg">投稿</button>
        </div>
    </form>
 
</div>

@endsection