@extends('layouts.head')
@section('content')
<!-- ーーーーーーーーーー検索タイムラインーーーーーーーーーー -->
    <!-- 投稿BOX -->
    <div  class="w-100 py-4 share-flex-column-center">
        <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
            <div class="col"></div>
            <div class="col h1">検索</div>
        </div>
        <!-- 検索 -->
        <div class="w-75 d-flex justify-content-end">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                検索
            </button>
        </div>
        <!-- 検索モーダル -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title" id="exampleModalCenterTitle">検索</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <form action="{{ route('search.timeline') }}" method="post">
                                @csrf                            
                                <div class="form-group">
                                    <label for="date">日付</label>
                                    <input type="date" name="date" class="form-control" id="date" value='{{ $date }}'>
                                </div>                 
                                <div class="form-group">
                                    <label for="keyword">検索ワード</label>
                                    <input type="text" name="keyword"  class="form-control" id="keyword" value='{{ $keyword }}' placeholder="検索">
                                </div>
                                <div class='row justify-content-center'>
                                    <button type='submit' class='btn btn-primary mt-3'>検索</button>
                                </div> 
                            </form>
                        </div>
                    </div>    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>    
        @foreach ($posts as $post)    
        <div class="w-75 share-timeline-post-box row border border-1 rounded share-bg my-4 shadow">

            <!-- 投稿左部分 -->
            <div class="col-sm">
                <div class="d-flex align-items-center share-height-90">
                    <!-- アイコン -->        
                    <a class="rounded-circle share-post-icon d-flex align-items-center justify-content-center" 
                    href="{{ route( 'users.page',[ 'post' => $post['id'] ]) }}">
                        <img src="{{ asset($post['user']['image']) }}" onerror="this.src='{{asset('imges/icons8-ユーザー-96.png')}}'" alt="">
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
                <a  class="btn btn-primary my-2" href="{{ route('comment', ['post' => $post['id']]) }}">
                コメント表示
                </a>
                <p>{{ $post['created_at'] }}</p>  
                          
            </div>
            
        </div>
        @endforeach         
    </div>
    
@endsection