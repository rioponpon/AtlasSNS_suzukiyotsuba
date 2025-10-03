<x-login-layout>
<div class=form-search>
<form action="/search" method="get" class="search-form">
            <input type="search" name="search" placeholder="ユーザー名を入力" value="@if (isset($search)) {{ $search }} @endif" class="search-input">
            <input type="image" src="./images/search.png" alt="検索" class="pp">

        </form>
        </div>

        <!-- 検索ワードを表示 -->
         <!-- if (!empty($keyword))
         <p>検索ワード:{$keyword}</p>
         endif -->


         @foreach($users as $user)

         @if(isset($user)and!(Auth::user()==$user))

    <div class="user">

    @csrf
    <div class="post-image">
    <img src="{{ asset('images/' . $user->icon_image) }}"
     alt="{{ $user->username }}"
     class="userIcon">

     <span class="user-name">
  {{ $user->username }}
    </span>
  </div>

  <div class="user-action">
        @if (auth()->user()->isFollowing($user->id))
        <form action="{{ route('unfollow',[$user->id]) }}" class="unfollow_btn">
@csrf
        <button type="submit" class="btn-unfollow">フォロー解除</button>
        </form>

        @else

        <form action="{{ route('follow' ,[$user->id]) }}" class="follow_btn">
            @csrf
             <button type="submit" class="btn-primary"> フォローする</button>
        </form>
        @endif
        </div>
</div>
        @endif



         @endforeach
</x-login-layout>
