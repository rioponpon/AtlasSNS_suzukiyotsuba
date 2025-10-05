<x-login-layout>
  <!-- @if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif -->

<div class="update">
  {!! Form::open(['url' => '/profile/update','method' => 'post','enctype' => 'multipart/form-data']) !!}
  @csrf
  {{ Form::hidden('id',Auth::user()->id)}}
  <img class="Myicon" src="{{ asset('images/' . Auth::user()->icon_image) }}">
  <div class="update-form">
    <div class="update-block">
      <label for="name">ユーザー名</label>
      <input type="text" name="username" value="{{Auth::user()->username}}">
    </div>
    <div class="update-block">
      <label for="email">メールアドレス</label>
      <input type="email" name="email" value="{{Auth::user()->email}}">
  </div>
  <div class="update-block">
    <label for="password">パスワード</label>
    <input type="password" name="password" value="">
  </div>
  <div class="update-block">
    <label for="password_confirmation">パスワード確認</label>
<input type="password" name="password_confirmation" value="">
</div>
<div class="update-block">
  <label for ="bio">自己紹介</label>
<input type="text" name="bio" value="{{Auth::user()->bio}}">
</div>
<div class="icon-block">
  <label for="icon">アイコン画像</label>
  <input type="file" name="images">
</div>
<input type="submit" class="btn-danger" value="更新">
{{Form::token()}}
{!! Form::close() !!}
</div>
</div>
</x-login-layout>
