@extends('layouts.head')
@section('content')
<!-- ーーーーーーーーーータイムラインーーーーーーーーーー -->
    <!-- 投稿BOX -->
    <div class="w-100 py-4 share-flex-column-center">    
    @foreach ($posts as $post)    
        <div class="w-75 share-timeline-post-box row border border-1 rounded share-bg my-4 shadow">
            <!-- 投稿左部分 -->
            <div class="col-sm">
                <div class="d-flex align-items-center share-height-90">
                    <!-- アイコン -->        
                    <a class="rounded-circle share-post-icon d-flex align-items-center justify-content-center" href="">
                    <img src="{{ $post['user']['image'] }}" alt="">
                    </a>                    
                    <!-- 留学地域  -->
                    <div class="ml-5 share-fontsize1">{{ $post['spot'] }}</div>
                
                </div>
                <!-- 投稿画像 -->
                <div class="mt-5 share-post-img">
                    <img class="share-box52" src="{{ asset($post['image']) }}" alt="">
                </div>
            </div>
            <!-- 投稿右部分 -->
            <div  class="col-sm h-100">
                <div class="w-100 d-flex justify-content-end ">
                    <a href="" class="share-post-img-ban"><img src="{{asset('imgs/ban.png')}}" alt=""></a>
                </div>
                <div class="w-100 mt-5 d-flex justify-content-center">
                    <div class="share-fontsize2">{{ $post['title'] }}</div>
                </div>
                <div class="mt-3 share-post-text">
                    <textarea  class="form-control h-100" readonly>{{ ($post['text']) }}</textarea>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@endsection