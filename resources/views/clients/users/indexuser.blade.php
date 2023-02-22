@extends('clients.layouts.client')

@section('title')
    ユーザーを追加
@endsection
@section('sidebar')
    @parent
    <h4>Home sidebar</h4>
@endsection
@section('content')
    @if (session('msg'))
    <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h1>ユーザー管理</h1>
    @csrf
    <button type="submit" class="btn btn-primary" name="confirm">確認する</button>
    <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
@endsection



