<x-login-layout>


  <!-- <h2>機能を実装していきましょう。</h2> -->
<div class="post-form">



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
<button type="submit" class="Upload"><img class="Upload"src="images/post.png" alt="送信"></button>
{!! Form::close()!!}
</div>

{{-- 投稿一覧 --}}
<div class ="mt-5">

  @foreach ($posts as $post)
  <div class="card mb-3">
<div class="card-body">

    <!-- ユーザーのアイコン !-->
    <div class="post-cell">

      @if($post->user->icon_image === 'icon1.png')
      {{-- デフォルトアイコン(public/images/icon1.png) --}}
      <img class ="MyIcon"src="{{ asset('images/icon1.png') }}"
    alt="no image">
    @else
     <img class="MyIcon" src="{{ asset('storage/user-images/'. $post->user->images) }}"
    alt="{{ $post->user->username }}">
    @endif
  </div>
  <div class="post-group">
    <div class="post-name">{{ $post->user->username }}</div>
      <div class="post">{{ $post->post }}</div>
  <small>{{ $post->created_at->format('Y-m-d H:i') }}</small>
  </div>


  <!--編集-->
  @if(Auth::id() ==$post->user_id)
  <div class="update-btn">
    <a href="" post="{{ $post->post }}" post_id="{{ $post->id }}" class="modal_open">
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
      <textarea name="upPost" class="modal_post">{{ $post->post }}</textarea>
      <input type="hidden" name="id" class="modal_id" value="{{ $post->id }}">

      {{ csrf_field() }}
      <div class ="modal_footer">
      <button type="submit" class="submit-btn">
      <img class="submit" src="./images/edit.png" alt="更新">
      </button>
      </div>
    </form>

  </div>
</div>

</x-login-layout>
