@extends('layouts.head')
@section('content')
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"><a href="{{ route('manager_post.index') }}" class="btn btn-outline-secondary" style="width:30rem;">投稿リストへ</a></div>
        <div class="col"></div>
        <div class="col"><a href="{{ route('logout') }}" class="btn btn-outline-secondary" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
    </div>
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col h3">ユーザーリスト上位10件</div>
        <div class="col"><p class="bg-danger text-white">USER LIST</p></div>
    </div>
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">ユーザーid</th>
            <th scope="col">ユーザー名</th>
            <th scope="col">ステータス</th>
            <th scope="col">表示停止数</th>
            <th scope="col">利用停止</th>
            </tr>
        </thead>
        <tbody>
            @foreach($reports as $report)
            <tr>
            <!-- id -->
            <th scope="row">{{ $report['user_id'] }}</th>
            <!-- 名前 -->
            <td>{{ $report['user']['name']}}</td>
                <!-- ステータス -->
                @if($report['user']['del_flg'] ==1)
                    <td class="text-danger">停止</td>
                @else
                    <td class="text-primary">利用中</td>
                @endif
            <!-- 投稿表示停止数 -->
            <td>{{$report['count_flg']}}</td>
            <!-- 非表示処理 -->
            <td>
                <form action="{{ route('manager_user.destroy',['manager_user'=>$report['user_id'] ]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                <button type='submit' class="btn btn-primary" >停止</button>
                </form>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection