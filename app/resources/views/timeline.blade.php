@extends('layouts.head')
@section('content')
<!-- ーーーーーーーーーータイムラインーーーーーーーーーー -->
    <!-- 投稿BOX -->
    <div  class="w-100 py-4 share-flex-column-center">
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
                                    <input type="date" name="date" class="form-control" id="date">
                                </div>                 
                                <div class="form-group">
                                    <label for="text">検索ワード</label>
                                    <input type="text" name="keyword"  class="form-control" id="text"  placeholder="検索">
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
    <!-- 無限スクロールjsから取得 -->
    <div id="content"></div>  
    
    

    <!-- 無限スクロール -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        

        $(document).ready(function () { //ページの読み込みが完了
            //Ajaxで419エラーが返ってくる下記追加　（原因CSRFトークンのエラー）
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var page = 0;
            // スクロールされた時に実行    
            $(window).on("scroll", function () {
                // スクロール位置

                    var document_h = $(document).height();              
                    var window_h = $(window).height() + $(window).scrollTop();    
                    var scroll_pos = (document_h - window_h);  

                // 画面最下部にスクロールされている場合
                if (scroll_pos <= 1) {

                    // ajaxコンテンツ追加処理
                    page++;
                    // console.log('最下部');
                    // console.log(page);
                    ajax_add_content(page);
                }
            });

            function ajax_add_content(page) {
                var add_content = "";        
                $.ajax({
                    type: "POST",
                    datatype: "json",
                    url: '/addpage/'+page,
                }).done(function(data){
                    console.log('成功',data);
                    $.each(data,function(key,val){ //$.each foreachと同じ
                        add_content += 
                        "<div class='w-100 py-4 share-flex-column-center'>"+    
                            "<div class='w-75 share-timeline-post-box row border border-1 rounded share-bg my-4 shadow'>"+
                                "<div class='col-sm'>"+
                                    "<div class='d-flex align-items-center share-height-90'>"+
                                        "<a class='rounded-circle share-post-icon d-flex align-items-center justify-content-center' href='user/page/"+val.id+"'>"+
                                            "<img src='"+val.user.image+"' alt='' onerror=\"this.src='imges/icons8-ユーザー-96.png'\">"+
                                        "</a>"+                   
                                        "<!-- 留学地域  -->"+
                                        "<div class='ml-5 share-fontsize1'>" +val.spot+ "</div>"+
                                    "</div>"+
                                    "<div class='mt-5 share-post-img'>"+
                                        "<img class='share-box52' src='"+val.image+"' onerror=\"this.src='imges/hardwood-1851074_1280.jpg'\">"+
                                    "</div>"+
                                "</div>"+
                                
                                "<div  class='col-sm h-100'>"+
                                    "<div class='w-100 d-flex justify-content-end'>"+
                                        "<a href='/report/"+val.id+"' class='share-post-img-ban'>"+"<img src='{{asset('imges/icons8-キャンセル２-50.png')}}' alt='' >"+"</a>"+
                                    "</div>"+
                                    "<div class='w-100 mt-5 d-flex justify-content-center'>"+
                                        "<div class='share-fontsize2'>"+"</div>"+
                                    "</div>"+
                                    "<div class='mt-3 share-post-text'>"+
                                        "<textarea  class='form-control h-100' readonly>"+val.text+"</textarea>"+
                                    "</div>"+
                                    "<a type='button' class='btn btn-primary my-2' href='/comment/"+val.id+"'>"+
                                    "コメント表示"+
                                    "</a>"+
                                    "<p>"+val.created_at+"</p>"+
                                "</div>"+
                            "</div>"+      
                        "</div>"         
                    });
                    $("#content").append(add_content); //bladeのidに送る
                    
                }).fail(function(){
                    console.log('エラー');
                })
            }
        });
    </script>
@endsection