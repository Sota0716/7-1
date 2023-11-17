@extends('layouts.head')
@section('content')
    <!-- ーーーーーーーーーーマイページ　コメント表示ーーーーーーーーーー-->
<!-- 完了メッセージ -->
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<!-- マイページトップ -->    
    <div class="w-100 d-flex justify-content-center">
        <div class="w-75 share-mypage-top row align-items-center">
            <!-- 左部分 -->
            <div class="col w-50 d-flex align-items-center pb-5">
                <div class="mx-5">
                    <a class="share-mypage-icon d-flex align-items-center justify-content-center" href="{{ route('mypage') }}"><img src="{{ asset($user->image) }}" alt=""></a>
                </div>
                <div class="share-fontsize3 mx-2">
                    <div>ユーザー名</div>
                    <div>留学地域</div>
                    <div>プロフィール</div>                
                </div>
                <div class="share-fontsize3 mx-2">                
                    <div>:{{ $user->name }}</div>
                    <div>:{{ $user->spot }}</div>
                    <div>:{{ $user->profile }}</div>
                </div>
                

            </div>
            <!-- 右部分 -->
            <div class=" w-50 col share-fontsize3 share-mypage-top-right ">
                <div class="share-mypage-box1 d-flex align-items-center justify-content-center border border-primary">
                    <a class="" href="{{ route('create.post.form') }}">新規投稿</a>
                </div>
                <div class="share-mypage-box1 d-flex align-items-center justify-content-center border border-primary share-mypage-margin1 ">
                    <a href="{{ route('profile.edit.form') }}" class="">プロフィール編集</a>
                </div>
                <div class="share-mypage-box1 d-flex align-items-center justify-content-center border border-danger">
                    <a href="{{ route('logout') }}" class="text-danger" 
                    onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
                </form>
            </div>
        </div>
    </div>
<!-- コメントした投稿 などフィルター -->
    <div class="w-100 row row-cols-3 border-top border-bottom share-mypage-filter">
        <div class="col share-flex-column-center share-mypage-box ">
            <a href=""><img src="{{ asset('imges/icons8-コメント-100.png') }}" alt=""></a>
        </div>
        <div class="col share-flex-column-center share-mypage-box">
            <a href="{{ route('mypage') }}"><img src="{{ asset('imges/icons8-ハッピー-96.png') }}" alt=""></a>
        </div>
        <div class="col share-flex-column-center share-mypage-box">
            
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
                                <img src="{{ asset($post['post']['user']['image']) }}" alt="">
                            </a>                                                                        
                        <!-- 留学地域  -->
                        <div class="ml-5 share-fontsize1">{{ $post['post']['spot'] }}</div>
                    </div>
                    <!-- 投稿画像 -->
                    <div class="mt-5 share-post-img">
                        <img class="share-box52" src="{{ asset($post['post']['image']) }}" alt="">
                    </div>
                </div>
                <!-- 投稿右部分 -->
                <div  class="col-sm h-100">
                    <div class="w-100 d-flex justify-content-end ">
                        <a href="" class="share-post-img-ban"><img src="{{asset('imgs/ban.png')}}" alt=""></a>
                    </div>
                    <div class="w-100 mt-5 d-flex justify-content-center">
                        <div class="share-fontsize2">{{ $post['post']['title'] }}</div>
                    </div>
                    <div class="mt-3 share-post-text">
                        <textarea  class="form-control h-100" readonly>{{ ($post['post']['text']) }}</textarea>
                    </div>
                    <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModalLong{{ $post['post']['id'] }}">
                    コメント表示
                    </button>
                </div>
                <!-- モーダル -->
                <div class="modal fade" id="exampleModalLong{{ $post['post']['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header bg-primary text-white">
                            <h5 class="modal-title" id="exampleModalLongTitle">{{ $post['post']['title'] }}</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <!-- コメント表示 -->
                        <div class="modal-body">
                            @foreach ($comments as $comment)
                                @if($comment['post_id']== $post['post']['id'])
                                    <div class="w-100 border-top border-bottom">
                                        <div>{{ $comment['created_at'] }}</div>
                                        <div class="w-100 d-flex">
                                            <div class="bg-info text-white rounded-pill">{{ $comment['user']['name'] }}</div>           
                                            <div class="mx-2">{{ $comment['text'] }}</div>
                                        </div>    
                                    </div>                            
                                @endif
                            @endforeach
                        </div>
                        <div class="modal-footer bg-secondary text-white">
                            <!-- コメント送信 -->
                            <form action="{{ route('create.comment',[ 'post'=>$post['post']['id'] ]) }}" method="post" class="w-100">
                            @csrf    
                                <div  class="form-group">
                                    <label for="text1">コメントする</label>
                                    <div class="d-flex justify-content-center">
                                        <input type="text" name="text" id="text1" class="form-control w-75">
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
                                        <button type="submit" class="btn btn-primary">送信</button>
                                    </div>    
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection