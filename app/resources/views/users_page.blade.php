@extends('layouts.head')
@section('content')
<!-- ーーーーーーーーーー他ユーザーページーーーーーーーーーー-->
<!-- ページトップ -->
    <div class="w-100 d-flex justify-content-center">
        <div class="w-75 share-mypage-top row align-items-center">
            <!-- ページトップ左部分 -->
            <div class="col w-50 d-flex align-items-center pb-5">
                <div class="mx-5">
                @foreach ($posts as $post)    
                    @if($loop->first)               
                    <a class="share-mypage-icon d-flex align-items-center justify-content-center" href=""><img src="{{ asset($post['user']['image']) }}" alt="" onerror="this.src='{{asset('imges/icons8-ユーザー-96.png')}}'"></a>
                    @endif
                @endforeach
                </div>
                <div class="share-fontsize3 mx-2">
                    <div>ユーザー名</div>
                    <div>留学地域</div>
                    <div>プロフィール</div>                
                </div>
                <div class="share-fontsize3">
                    <div>:</div>
                    <div>:</div>
                    <div>:</div>                
                </div>            
                <!-- ユーザーデータ表示 -->
                <div class="share-fontsize3 "style="width:15rem;">
                @foreach ($posts as $post)    
                    @if($loop->first)               
                    <div>　{{ $post['user']['name'] }}</div>
                    <div class="text-nowrap">　{{ $post['user']['spot'] }}</div>
                    <div class="overflow-auto text-nowrap">　{{ $post['user']['profile'] }}</div>
                    @endif
                @endforeach    
                </div>
                
                

            </div>
            <!-- ページトップ右部分 -->
            <div class=" w-50 col share-fontsize3 share-mypage-top-right ">
                
            </div>
        </div>
    </div>
    <!-- 投稿表示 -->
    <div class="w-100 py-4 share-flex-column-center">    
        @foreach ($posts as $post)    
            <div class="w-75 share-timeline-post-box row border border-1 rounded share-bg my-4 shadow">
                <!-- 投稿左部分 -->
                <div class="col-sm">
                    <div class="d-flex align-items-center share-height-90">
                        <!-- アイコン -->        
                        <a class="rounded-circle share-post-icon d-flex align-items-center justify-content-center" href="">
                        <img src="{{ asset($post['user']['image']) }}" alt="" onerror="this.src='{{asset('imges/icons8-ユーザー-96.png')}}'">
                        </a>                    
                        <!-- 留学地域  -->
                        <div class="ml-5 share-fontsize1">{{ $post['spot'] }}</div>
                    
                    </div>
                    <!-- 投稿画像 -->
                    <div class="mt-5 share-post-img">
                        <img class="share-box52" src="{{ asset($post['image']) }}" onerror="this.src='{{asset('imges/hardwood-1851074_1280.jpg')}}'">
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
                    <a  class="btn btn-primary my-2" href="{{ route('comment', ['post' => $post['id']]) }}">
                    コメント表示
                    </a>
                </div>
                <!-- モーダル -->
                
            </div>
        @endforeach
    </div>

@endsection