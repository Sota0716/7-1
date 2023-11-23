@extends('layouts.head')
@section('content')
    <!-- ーーーーーーーーーー 退会完了ページ ーーーーーーーーーー -->
    <div class="w-100 py-4 share-flex-column-center py-5">
        <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
            <div class="col"></div>
            <div class="col h1">退会完了しました</div>
        </div>
        <a href="{{ route('timeline') }}" class="btn btn-primary btn-lg" style="width:15rem;">タイムラインへ</a>
    </div>
@endsection