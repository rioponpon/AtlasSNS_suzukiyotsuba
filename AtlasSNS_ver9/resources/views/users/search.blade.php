<x-login-layout>

<form action="{{ route('users.search') }}" method="post">
            <input type="search" name="search" placeholder="ユーザー名を入力" value="@if (isset($search)) {{ $search }} @endif">

            <img class="search" src="./images/AtlasSNS_ver9/public/images/search.png." alt="検索" />
        </form>
        <!-- 検索ワードを表示 -->
         @if (!empty($keyword))
         <p>検索ワード:{{$keyword}}</p>
         @endif
</x-login-layout>
