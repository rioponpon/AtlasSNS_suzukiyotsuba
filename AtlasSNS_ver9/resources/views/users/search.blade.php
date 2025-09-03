<x-login-layout>

<form action="/search" method="get">
            <input type="search" name="search" placeholder="ユーザー名を入力" value="@if (isset($search)) {{ $search }} @endif">

            <img class="search" src="./images/search.png." alt="検索" />
        </form>

        <!-- 検索ワードを表示 -->
         <!-- if (!empty($keyword))
         <p>検索ワード:{$keyword}</p>
         endif -->


         @foreach($users as $user)

         @if(isset($user)and!(Auth::user()==$user))
         <tr>

        <td><img src="{{ $user->image }}"><td>
        </td>{{{ $user->username }}}
         </tr>
@endif

    @csrf
    <input type="hidden" name="user_id" value="{{ $user->username }}">
        @if (auth()->user()->isFollowing($user->id))
        <button type="submit" class="btn-primary">
        <form action="{{ route('unfollow',[$user->id]) }}" class="btn unfollow_btn">フォロー解除</form>
</button>
        @else
        <button type="submit" class="btn-primary">
        <form action="{{ route('follow' ,[$user->id]) }}" class="btn follow_btn">フォローする</form>
        </button>
        @endif


         @endforeach
</x-login-layout>
