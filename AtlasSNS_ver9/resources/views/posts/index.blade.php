<x-login-layout>


  <h2>機能を実装していきましょう。</h2>
<div class="container">

{!! Form::open(['url' => '/top'])!!}
{{Form::token() }}
<div class="from-group">
  {{ Form::input('text','newpost',null,[
    'required',
    'class'=> 'form-control',
    'placeholder' => '投稿内容を入力してください',
    'maxlength' => '150'
    ])}}
</div>
<button type="submit" class="btn btn-success pull-right"><img src="images/post.png" alt="送信"></button>
{!! Form::close()!!}
</div>

{[-- 投稿一覧 --]}
<div class ="mt-5">
  <h3>投稿一覧</h3>
  @forelse ($posts as $posts)
  <div class="card mb-3">
<div class="card-body">
  <p>{{ $post->post }}</p>
</div>
  </div>
  @empty
  @endforelse
  </div>
</x-login-layout>

</x-login-layout>
