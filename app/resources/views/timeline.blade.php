@extends('layouts.head')
@section('content')
<div class="container-fluid d-flex justify-content-center py-5">
    <!-- 投稿BOX -->
    @foreach ($posts as $post)
    <div class="row share-timeline-post-box border border-1 rounded share-bg">
        <!-- 投稿左部分 -->
        <div class="col-sm">
            <div class="d-flex align-items-center share-height-90">
                <!-- アイコン -->
                <a class="rounded-circle share-post-icon" href=""><img src="" alt=""></a>
                <!-- 留学地域  -->
                <div class="ml-5 share-fontsize1">{{ $post['spot'] }}</div>
               
            </div>
            <!-- 投稿画像 -->
            <div class="mt-5 share-post-img">
                <img src="{{ asset($post['image']) }}" alt="">
            </div>
        </div>
        <!-- 投稿右部分 -->
        <div  class="col-sm w-100 h-100">
            <div class="w-100 d-flex justify-content-end ">
                <a href="" class="share-post-img-ban"><img src="{{asset('imgs/ban.png')}}" alt=""></a>
            </div>
            <div class="w-100 mt-5 d-flex justify-content-center">
                <div class="share-fontsize2">{{ $post['title'] }}</div>
            </div>
            <div class="mt-3 share-post-text">
                <div>{{ $post['text'] }}</div>
            </div>
        </div>

    </div>
    @endforeach
</div>
@endsection