@extends('layouts.head')
@section('content')
<!-- ーーーーーーーーーーコメントページーーーーーーーーーー -->
    <div class="w-100 py-4 share-flex-column-center">
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
        @foreach ($posts as $post)    
        <div class="w-75 share-timeline-post-box row border border-1 rounded share-bg my-4 shadow">
            <!-- 投稿左部分 -->
            <div class="col-sm">
                <div class="d-flex align-items-center share-height-90">
                    <!-- アイコン -->        
                    <a class="rounded-circle share-post-icon d-flex align-items-center justify-content-center" 
                    href="{{ route( 'users.page',[ 'post' => $post['id'] ]) }}">
                        <img src="{{asset( $post['user']['image'] ) }}" alt="" onerror="this.src='{{asset('imges/icons8-ユーザー-96.png')}}'">
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
                    <a href="{{ route('report.form',['post' => $post['id'] ]) }}" class="share-post-img-ban"><img src="{{asset('imges/icons8-キャンセル２-50.png')}}" alt=""></a>
                </div>
                <div class="w-100 mt-5 d-flex justify-content-center">
                    <div class="share-fontsize2">{{ $post['title'] }}</div>
                </div>
                <div class="mt-3 share-post-text">
                    <textarea  class="form-control h-100" readonly>{{ $post['text'] }}</textarea>
                </div>            
            </div>
        </div>
        @endforeach
        <!-- コメント -->
        <div class="card w-75">
                <h5 class="card-header bg-primary text-white">コメント一覧</h5>
                    <div class="card-body">
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
                <div class="card-footer">
                    <form action="{{ route('create.comment',[ 'post'=>$post['id'] ]) }}" method="post" class="w-100">
                        @csrf    
                            <div  class="form-group">
                                <label for="text1">コメントする</label>
                                <div class="d-flex justify-content-center">
                                    <input type="text" name="comment" id="text1" class="form-control w-75">                                    
                                    <button type="submit" class="btn btn-primary">送信</button>
                                </div>    
                            </div>
                    </form>
                </div>
            </div>         
        </div>
@endsection