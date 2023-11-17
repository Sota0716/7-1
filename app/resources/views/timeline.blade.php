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
                    <a class="rounded-circle share-post-icon d-flex align-items-center justify-content-center" 
                    href="{{ route( 'users.page',[ 'post' => $post['id'] ]) }}">
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
                    <a href="{{ route('report.form',['post' => $post['id'] ]) }}" class="share-post-img-ban"><img src="{{asset('imges/icons8-キャンセル２-50.png')}}" alt=""></a>
                </div>
                <div class="w-100 mt-5 d-flex justify-content-center">
                    <div class="share-fontsize2">{{ $post['title'] }}</div>
                </div>
                <div class="mt-3 share-post-text">
                    <textarea  class="form-control h-100" readonly>{{ $post['text'] }}</textarea>
                </div>
                <button type="button" class="btn btn-primary my-2" data-toggle="modal" data-target="#exampleModalLong{{ $post['id'] }}">
                コメント表示
                </button>
            </div>
            <!-- モーダル -->
            <div class="modal fade" id="exampleModalLong{{ $post['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalLongTitle">{{ $post['title'] }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- コメント表示 -->
                    <div class="modal-body">
                        @foreach ($comments as $comment)
                            @if($comment['post_id']== $post['id'])
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
                        <form action="{{ route('create.comment',[ 'post'=>$post['id'] ]) }}" method="post" class="w-100">
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