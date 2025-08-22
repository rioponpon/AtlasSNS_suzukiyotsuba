<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
<div class="container">

{!! Form::open(['url' => '/top'])!!}
{{Form::token() }}
<div class="from-group">
  {{ Form::input('text','newpost',null,['required','class'=> 'form-control','placeholder' => '投稿内容を入力してください'])}}
</div>
<button type="submit" class="btn btn-success pull-right"><img src="imges/post.png" alt="送信"></button>
{!! Form::close()!!}
</div>
</x-login-layout>
