@extends('clients.layouts.client')

@section('title')
    ユーザー管理
@endsection
@section('sidebar')
    @parent
    <h4>Home sidebar</h4>
@endsection
@section('content')
    @if (session('msg'))
       <div class="alert alert-success">{{session('msg')}}</div>
    @endif
    <h1>ユーザー一覧</h1>
    <form action="" method="get" class="mb-3">
      <div class="row">
        <div class="col-3">
          <input type="search" class="form-control" name="keyword" value="{{request()->keyword}}" placeholder="名前">
        </div>
        <div class="col-2">
          <button type="submit" class="btn btn-primary">検索</button>
        </div>
      </div>
    </form>
    <form role="form" method="post" action="/users/kadai2">
        <table class="table table-striped">
            <colgroup>
            <col width="5%">
            <col width="20%">
            <col width="30%">
            <col width="30%">
            <col width="15%">
            </colgroup>
            <thead>
              <tr>
                <th>チェック</th>
                <th>名前</th>
                <th>都道府県</th>
                <th>メールアドレス</th>
                <th>行動</th>
              </tr>
            </thead>
            <tbody>
              @if (!empty($userList))
                @foreach ($userList as $key => $item)
                  <tr>
                    <td><input type="checkbox" name="checked[]" value="{{$item->id}}"></td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->mailaddress}}</td>
                    <td>
                    <a href="{{route('users.edit2',['id'=>$item->id])}}" class="btn btn-warning btn-sm">変更</a>
                    <a href="{{route('users.delete2',['id'=>$item->id])}}" onclick="return confirm('削除してもよろしいでしょうか。');" class="btn btn-danger btn-sm">削除</a>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
          @csrf
          <a href="{{route('users.add2')}}" class="btn btn-primary">新規登録する</a>
          {{-- <a href="{{route('users.sendmail')}}" class="btn btn-primary">メールを送信する</a> --}}
          {{-- <input type="submit" class="btn btn-primary" name="touroku" value="新規登録する"> --}}
          <input type="submit" class="btn btn-primary" name="sendmail" value = "メールを送信する">
          <a href="{{route('home')}}" class="btn btn-primary">戻る</a>
        </form>
@endsection
{{-- <script>
  function deleteUserconfirm(id)
  {
      if(confirm("削除してもよろしいでしょうか。"))
      {
        document.getElementByID('user-edit-action-'+id).submit();
      }
  }
</script> --}}

