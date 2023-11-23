@extends('layouts.head')
@section('content')
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"></div>
        <div class="col"><a href="{{ route('manager_post.index') }}" class="btn btn-outline-secondary" style="width:30rem;">投稿リストへ</a></div>
        <div class="col"><a href="{{ route('logout') }}" class="btn btn-outline-secondary" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">ログアウト</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
        </form>
        
    </div>
    <div class="w-100 py-4 share-flex-column-center py-5">
        <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
            <div class="col"></div>
            <div class="col h1">違反内容</div>
        </div>
        @foreach($reports as $report)
        <div class="card w-50 my-3" style="width:18rem;">
            <div class="card-header bg-primary text-white"><strong>Name:　</strong>{{ $report['user']['name'] }}</div>
            <div class="card-body">
            {{ $report['text'] }}
            </div>
            
        </div>
        @endforeach
    </div>
    
          
@endsection