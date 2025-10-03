<x-logout-layout>

  <!-- 適切なURLを入力してください -->
   <link rel="stylesheet" href="{{ asset('css/logout.css') }} ">
    <div class ="login">
  {!! Form::open(['url' => '/login']) !!}


  <p>AtlasSNSへようこそ</p>
<div class="form-group">
  {{ Form::label('メールアドレス') }}
  {{ Form::text('email',null,['class' => 'input']) }}
  </div>
  <div class="form-group">
  {{ Form::label('パスワード') }}
  {{ Form::password('password',['class' => 'input']) }}
</div>
<div class ="login-btn">
  {{ Form::submit('ログイン') }}
  </div>

  <div class="cc">
  <p><a href="/register">新規ユーザーの方はこちら</a></p>
  </div>
</div>
  {!! Form::close() !!}

</x-logout-layout>
