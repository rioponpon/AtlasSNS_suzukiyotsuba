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
  @foreach ($posts as $post)
  <div class="card mb-3">
<div class="card-body">
  <p>{{ $post->post }}</p>
  <small>投稿日: {{ $post->created_at->format('Y-m-d H:i') }}</small>
    <!-- ユーザーのアイコン !-->
    <div class="post-cell">
    <img class="MyIcon" src="{{ asset('storage/user-images/'. $post->user->images) }}"
    alt="{{ $post->user->username }}">
  </div>
  <!--編集-->
  @if(Auth::id() ==$post->user_id)
  <div class="update-btn">
    <!-- <a href="" post="{{ $post->post }}" post_id="{{ $post->id }}"> -->
      <img class="Update" src="./images/edit.png" alt="編集" />
  <!-- </a> -->
  </div>
  @else
  <td class="post-cell"></td>
  @endif
<!--削除-->
@if(Auth::id() == $post->user_id)
<div class="post-cell">
  <div class="delete-btn">
    <a href="/post/{{ $post->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
      <img class="Trash" src="./images/trash.png" alt="削除" />
  </a>
  </div>
</div>
@endif
</div>
  </div>

  @endforeach
  </div>
<!--編集画面-->
<div class="modal js-modal">
  <div class="modal_bg js-modal-close"></div>
  <div class="modal_content">
    <form action="/post/update" method="post">
      <textarea name="upPost" class="modal_post"></textarea>
      <input type="hidden" name="id" class="modal_id" value="{{ $post->id }}">
      <input type="submit" value="更新">
      {{ csrf_field() }}
    </form>
    <a class="js-modal-close" href="">閉じる</a>
  </div>
</div>

</x-login-layout>
