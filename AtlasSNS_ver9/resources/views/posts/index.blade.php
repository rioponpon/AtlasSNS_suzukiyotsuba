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

{{-- 投稿一覧 --}}
<div class ="mt-5">
  <h3>投稿一覧</h3>
  @forelse ($posts as $post)
  <div class="card mb-3">
<div class="card-body">
  <p>{{ $post->post }}</p>
  <!--編集-->
  @if(Auth::id() ==$post->user_id)
  <div class="update-btn">
    <a href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
      <img class="Update" src="./images/edit.png" alt="編集" />
  </a>
  </div>
  @else
  <td class="post-cell"></td>
  @endif
<!--削除-->
@if(Auth::id() == $post->user_id)
<div class="post-cell">
  <div class="delete-btn">
    <a href="/post/{{ $post->id }}/delete" onclick="return confilm('この投稿を削除します。よろしいでしょうか？')">
      <img class="Trash" src="./images/trash.png" alt="削除" />
  </a>
  </div>
</div>
</div>
  </div>
  @empty
  <p>投稿はありません</p>
  @endforelse
  </div>

</x-login-layout>
