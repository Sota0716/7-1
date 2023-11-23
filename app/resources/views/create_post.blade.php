@extends('layouts.head')
@section('content')

<!-- ーーーーーーーーーー新規投稿ーーーーーーーーーー -->

<div class="w-100 py-4 share-flex-column-center  py-5">
    <!-- 投稿BOX -->
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"></div>
        <div class="col h1">新規投稿</div>
    </div>
    <!-- バリデーションアラート -->
    @if($errors->any())
        @foreach($errors->all() as $massage)
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{ $massage }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        @endforeach
    @endif
    <form action="{{ route('create.post') }}" method="post" enctype="multipart/form-data" class="row share-timeline-post-box border border-1 rounded share-bg">
    @csrf
        <!-- 投稿左部分 -->
        
        <div class="col-6">
            <div class="d-flex align-items-center share-height-90">
                <!-- アイコン -->
                
                <!-- 留学地域 -->
                <div class="ml-5 share-fontsize1">
                    <input type="text" name="spot" placeholder="留学地" value="{{ old('spot') }}" autofocus>
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
                    <input type="text" name="title" placeholder="タイトル" value="{{ old('text') }}">
                </div>
            </div>
            <div class="mt-3  share-post-text">
                <textarea class="form-control h-100 " name="text">{{ old('text') }}</textarea>
            </div>
        </div>
        <div class="col d-flex justify-content-center py-4">
            <button type='submit' class="btn btn-primary btn-lg" onclick='return confirm("投稿しますか？")'>投稿</button>
        </div>
    </form>
 
</div>

@endsection