@extends('layouts.head')
@section('content')
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"><a href="{{ route('manager_user.index') }}" class="btn btn-outline-secondary" style="width:30rem;">ユーザーリストへ</a></div>
        <div class="col"></div>
        <div class="col"><a href="{{ route('logout') }}" class="btn btn-outline-secondary" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
    </div>
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col h3">投稿リスト上位20件</div>
        <div class="col"><p class="bg-secondary text-white">POST LIST</p></div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">投稿id</th>
            <th scope="col">ユーザー名</th>
            <th scope="col">報告数</th>
            <th scope="col">違反内容</th>
            <th scope="col">非表示</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
            <th scope="row">{{ $report['post_id'] }}</th>
            <td>{{ $report['post']['user']['name'] }}</td>
            <td>{{ $report['count_postid'] }}</td>
            <td><a href="{{route('manager_post.show',['manager_post'=>$report['post_id']]) }}">確認する</a></td>
            <td>
                <form action="{{ route('manager_post.destroy',['manager_post'=>$report['post_id'] ]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type='submit' class="btn btn-primary" >非表示</button>
                </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection