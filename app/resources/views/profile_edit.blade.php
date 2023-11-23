@extends('layouts.head')
@section('content')

<!-- ーーーーーーーーーープロフィール編集ーーーーーーーーーー -->

<div class="w-100 d-flex flex-column align-items-center justify-content-center">
<!-- トップ -->
    <div class="row row-cols-3 w-100 share-height-70 my-4 text-center">
        <div class="col"></div>
        <div class="col h1">プロフィール編集</div>
        <div class="col">
            <form action="{{ route('delete.user',['user' => $users['id'] ]) }}" method="post">
                @csrf
            <button type="submit" class="btn btn-outline-danger" onclick='return confirm("本当に退会しますか？")'>退会</button>
            </form>
        </div>
    </div>
<!-- 編集フォーム -->
    <div class="shadow w-75 my-2">
        <form action="{{ route('profile.edit')}}" method="post" enctype="multipart/form-data" class="d-flex flex-column align-items-center justify-content-center">
        @csrf
            <div class="share-profile-wh d-flex my-3 ">
                <div>
                    <label class="share-profile-width share-font-size" for="icon">アイコン</label>
                    <div class="share-profile-icon d-flex align-items-center justify-content-center "><img src="{{ asset($users['image']) }}" alt="" onerror="this.src='{{asset('imges/icons8-ユーザー-96.png')}}'"></div>
                </div>
                <input type="file" name="image"  class="">
            </div>
            <div class="d-flex my-3">
                <label class="share-width share-font-size" for="">ユーザー名</label>
                <input type="text" name="name" value="{{ $users['name'] }}" class="form-control shadow-sm">
            </div>
            <div class="d-flex my-3">
                <label class="share-width share-font-size" for="">メールアドレス</label>
                <input type="email" name="email" value="{{ $users['email'] }}" class="form-control shadow-sm">
            </div>
            <div class="d-flex my-3">
                <label class="share-width share-font-size" for="">留学地</label>
                <input type="text" name="spot" value="{{ $users['spot'] }}" class="form-control shadow-sm">
            </div>
            <div class="d-flex my-3">
                <label class="share-width share-font-size" for="">プロフィール</label>
                <input type="text" name="profile" value="{{ $users['profile'] }}" class="form-control shadow-sm">
            </div>
            <div>
                <button type="submit" class="btn btn-primary btn-lg">登録</button>
            </div>
        </form>
    </div>
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
</div>


@endsection



