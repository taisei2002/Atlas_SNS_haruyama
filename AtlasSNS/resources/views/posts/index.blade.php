@extends('layouts.login')
@section('content')
<!DOCTYPE html>
<body>

<div class = "index-form">
    <p><img src="{{ asset('/storage/images/'.Auth::user()->images) }}" class="rounded-circle" width="55" height="55"></a></p>
      <div class="form-group">
  <!--投稿フォーム-->
 {!! Form::open(['url' => '/post']) !!}
      {!! Form::input('text', 'newPost', null, ['required', 'class' => 'tweet_form', 'placeholder' => '投稿内容を入力してください']) !!}
  </div>
  </div>

  <!--投稿ボタン-->

        <button type="submit" class="btn-post"><img src="images/post.png"width="50" height="50"></button>
        <br></br>
    <h1 class =  "main_border"></h1>

   @foreach ($posts as $post)

 <div class="frame">
    <img src="{{ asset('/storage/images/'.$post->user->images) }}" alt="mitsuruog" class="rounded-circle"width="55" height="55">
    <span class="left">{{ $post->user->username}}</span>
     <span class="right">{{ $post->created_at}}　　</span>
  </div>
  <p class="right">{{ $post->post}}</p>

  <!-- 投稿の編集ボタン -->
  @if (Auth::user()->id == $post->user_id)
         <div class="content">
        <div class = "edit-btn">
        <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png"width="45" height="45">　</a>
          @if (Auth::user()->id == $post->user_id)
<a href="/post/{{$post->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash.png"width="45" height="45"></a></div>

    </div>
@endif
 {!! Form::close() !!}

   <!-- モーダルの中身 -->
    <div class="modal js-modal">

        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/update/{$post->user->id}"  method="">
                <textarea name="upPost" class="modal_post" ></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
            <!-- 更新ボタン -->
                <br></br>
                <input class= "modal_edit" type="image" src="images/edit.png" onclick="return confirm('こちらの投稿で再投稿します。')">
           </form>
           <a class="js-modal-close" href=""></a>
        </div>
        </div>
  @endif
  <hr class="style1">
@endforeach
@endsection


</body>
</html>
