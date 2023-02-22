@extends('clients.layouts.client')

@section('title')
    ユーザーを変更
@endsection
@section('sidebar')
    @parent
    <h4>Home sidebar</h4>
@endsection
@section('content')
    <h1>{{$title}}</h1>
    <form class="form-horizontal" role="form" method="POST" action="{{url('users/kadai2/'.$userDetail->id.'/edit')}}">
        @method('PUT')
        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    {{$error}}
                @endforeach
            </div>
        @endif --}}
        <div class="mb-3 mt-3">
            <label class="form-label">名前：</label>
            <input class="form-control" type="text" name="name" value="{{old('name') ?? $userDetail->name}}"/>
            @error('name')
                <span style="color:red; ">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">都道府県：</label>
            <input class="form-control" type="text" name="city" value="{{old('city') ?? $userDetail->city}}"/>
            @error('city')
                <span style="color:red; ">{{$message}}</span>
            @enderror
        </div>
        <div class="mb-3 mt-3">
            <label class="form-label">メールアドレス：</label>
            <input class="form-control" type="text" name="mailaddress" value="{{old('mailaddress') ?? $userDetail->mailaddress}}"/>
            @error('mailaddress')
                <span style="color:red; ">{{$message}}</span>
            @enderror
        </div>
        @csrf
        <button type="submit" class="btn btn-primary" name="confirm">確認する</button>
        {{-- <button type="button" class="btn btn-primary" onclick="history.back()">戻る</button> --}}
        <a href="{{route('users.list2')}}" class="btn btn-primary">戻る</a>
    </form>
@endsection



