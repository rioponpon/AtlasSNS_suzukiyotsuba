<x-logout-layout>

  <div id="clear">
  <form action="/register" method="post">
    <link rel="stylesheet" href='/Users/suzukiyotsuba/AtlasSNS_suzukiyotsuba/AtlasSNS_ver9/public/css/app.css'>
    <link rel="stylesheet" href="{{ asset('/css/app.css') }}">

    <div class="message">
    <p>{{Auth::user()->username}}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
    <div class="massage_">
    <p>ユーザー登録が完了しました。</p>
    <p>早速ログインをしてみましょう。</p>
</div>

    <div class="login_btn"><a href="login">ログイン画面へ</a></div>
</div>
  </div>
</x-logout-layout>
