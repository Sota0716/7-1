@extends('layouts.head')
@section('content')
    <!-- ーーーーーーーーーーエラーページーーーーーーーーーー-->
    <div class="w-100 py-4 share-flex-column-center py-5">
        <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
            <div class="col"></div>
            <div class="col h1">不正なアクセスです</div>
        </div>
        <a href="javascript:history.back()" class="btn btn-outline-secondary" style="width:15rem;">戻る</a>
    </div>    
@endsection