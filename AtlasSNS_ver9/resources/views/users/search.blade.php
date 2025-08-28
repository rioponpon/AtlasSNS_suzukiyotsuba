<x-login-layout>

<form action="/search" method="post">
            @csrf
            <input type="text" name="keyword" class="form" placeholder="検索ワード">
            <img class="search" src="./images/AtlasSNS_ver9/public/images/search.png." alt="検索" />
        </form>
</x-login-layout>
