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

        <td><img src="{{ $user->images }}"><td>
        </td>
        <td>{{{ $user->username }}}
</td>
        <td>

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
        @endif


         @endforeach
</x-login-layout>
