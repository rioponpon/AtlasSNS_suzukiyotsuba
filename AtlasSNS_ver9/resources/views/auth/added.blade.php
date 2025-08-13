<x-logout-layout>

  <div id="clear">
  <form action="/register" method="post">
    <link rel="stylesheet" href='/Users/suzukiyotsuba/AtlasSNS_suzukiyotsuba/AtlasSNS_ver9/public/css/app.css'>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <p>{{ $username }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>


    <p class="btn"><a href="login">ログイン画面へ</a></p>

  </div>
</x-logout-layout>
