<x-login-layout>



<div class="container">
    {{-- ユーザー情報 --}}
    <div class="mb-4">

       <img src="{{ asset('images/' . $user->icon_image) }}"
     alt="{{ $user->username }}"
     class="MyIcon">
        <h3>{{ $user->username }}</h3>
        <h4>{{ $user->bio }}</h4>

          @csrf
    <input type="hidden" name="user_id" value="{{ $user->username }}">
        @if (auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow',[$user->id]) }}" class="btn unfollow_btn">
@csrf
        <button type="submit" class="btn-primary">フォロー解除</button>
        </form>

        @else

        <form action="{{ route('follow' ,[$user->id]) }}" class="btn follow_btn">
            @csrf
             <button type="submit" class="btn-primary"> フォローする</button>
        </form>
        @endif

</td>
        </tr>

    </div>

    {{-- 投稿一覧 --}}

    @foreach($posts as $post)
    <img src="{{ asset('images/' . $user->icon_image) }}"
     alt="{{ $user->username }}"
     class="MyIcon">
     <p>{{ $post->user->username }}</p>
        <div class="card mb-3">
            <div class="card-body">
                <p>{{ $post->post }}</p>
                <small class="text-muted">
                    投稿日: {{ $post->created_at->format('Y-m-d H:i') }}
                </small>
            </div>
        </div>
    @endforeach
</div>

@if($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
    @endif

<div class="update">
  {!! Form::open(['url' => '/profile/update','method' => 'get']) !!}
  @csrf
  {{ Form::hidden('id',Auth::user()->id)}}
  <img class="update-icon" src="images/icon1.png">
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
<div class="update-block">
  <label for="icon">アイコン画像</label>
  <input type="file" name="images">
</div>
<input type="submit" class="btn-danger">
{{Form::token()}}
{!! Form::close() !!}
</div>

</x-login-layout>
