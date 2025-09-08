<x-logout-layout>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <!-- 適切なURLを入力してください -->
</head>
    <div class="container">
{!! Form::open(['url' => '/register',]) !!}

<h2>新規ユーザー登録</h2>
<div class="form-group">
{!! Form::label('username','ユーザー名') !!}

{!! Form::text('username',null,[
    'class' => 'input',
    'required' => true,
    'minlength' => 2,
    'maxlength' => 12,
    'placeholder' => 'ユーザー名',
    ]) !!}</div>
<div class ="form-group">
{{ Form::label('メールアドレス') }}
{{ Form::email('email',null,[
    'class' => 'input',
    'required' => true,
    'minlength' => 5,
    'maxlength' => 40,
    'email' => 'email:rfc,dns',
    ]) }}
</div>
<div class ="form-group">
{{ Form::label('パスワード') }}
{{ Form::text('password',null,[
    'class' => 'input',
    'required' => true,
    'minlength'=> 8,
    'maxlength' => 20,
    'password' => 'alpha_num:ascii',
     ]) }}
</div>
<div class ="form-group">
{{ Form::label('パスワード確認') }}
{{ Form::text('password_confirmation',null,[
    'class' => 'input',
    ]) }}
</div>
<div class ="register-btn">
{{ Form::submit('新規登録') }}
</div>


<p><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}

</div>
</x-logout-layout>
