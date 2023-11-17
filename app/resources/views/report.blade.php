@extends('layouts.head')
@section('content')

<!-- ーーーーーーーーーー違反報告ーーーーーーーーーー -->
<div class="w-100 py-4 share-flex-column-center py-5">
    <!-- 投稿BOX -->
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"></div>
        <div class="col h1">違反報告</div>
    </div>
    <form action="{{ route('create.report',$post['id']) }}" method="post">
        @csrf
        <div class="card" style="width:30rem;">
            
            <div class="h3 card-header">内容</div>
            <input class="card-body" name="text">
        </div>
        <div class="share-flex-column-center py-5">
            <button type="submit" class="btn btn-outline-danger my-4" style="width:15rem;" onclick='return confirm("報告しますか？")'>報告する</button>
            <!-- <a href="{{ url('/') }}" class="btn btn-outline-secondary" style="width:15rem;">戻る</a> -->
            <a href="javascript:history.back()" class="btn btn-outline-secondary" style="width:15rem;">戻る</a>
        </div>
    </form>
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"></div>
        <div class="col h3">※違反内容は必須ではありません</div>
    </div>
</div>
@endsection
