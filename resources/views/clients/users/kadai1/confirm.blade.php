@extends('clients.layouts.client')

@section('title')
    ユーザーを確認
@endsection
@section('sidebar')
    @parent
    <h4>Home sidebar</h4>
@endsection
@section('content')
    <h1>ユーザーを確認</h1>
    <form class="form-horizontal" role="form" method="POST" action="/users/kadai1/sendmail">
        <div class="mb-3 mt-3">
            <label class="form-label">名前：</label>
            <input type="text" value="{{$dataConfirm['name']}}" readonly name="name" style="border-style:hidden; border-color:white">
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">都道府県：</label>
            <input type="text" value="{{$dataConfirm['nation_name']}}" readonly name="city" style="border:none">   
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">メールアドレス：</label>
            <input type="text" value="{{$dataConfirm['mailaddress']}}" readonly name="mailaddress" style="border:none">
        </div>
        @csrf
        <button type="submit" class="btn btn-primary" name="confirm">メールを送信する</button>
        <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
        {{-- <a href="{{ route('users.add1') }}" class="btn btn-primary">戻る</a> --}}
    </form>
@endsection



