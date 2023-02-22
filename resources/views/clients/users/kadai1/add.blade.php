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
    <h1>ユーザーを追加</h1>
    <form class="form-horizontal" role="form" method="POST" action="/users/kadai1/confirm">
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif --}}
        <div class="mb-3 mt-3">
            <label class="form-label">名前：</label>
            <input class="form-control" type="text" name="name" value="" />
            
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">都道府県：</label>
            {{-- <input class="form-control" type="text" name="city" value="{{old('city')}}"/> --}}
            <select name="city" class="form-control" id="">
                @if (!empty($nationList))
                    @foreach ($nationList as $item)
                        <option value="{{$item->nation_name}}">{{$item->nation_name}}</option>
                    @endforeach             
                @endif
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">メールアドレス：</label>
            <input class="form-control" type="text" name="mailaddress" value=""/>
           
        </div>
        @csrf
        <button type="submit" class="btn btn-primary" name="confirm">確認する</button>
        <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button>
    </form>
@endsection



