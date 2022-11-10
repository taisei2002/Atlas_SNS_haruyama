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


   @foreach ($user as $user)



<hr class="style1">


 <div class="frame">
    <img src="{{ asset('/storage/images/'.$user->images) }}" alt="mitsuruog" class="rounded-circle"width="55" height="55">
    <span class="left">{{ $user->username}}</span>
     <span class="right">{{ $user->created_at}}</span>
  </div>
  <p class="right">{{ $user->post}}</p>

  <!-- 投稿の編集ボタン -->
  @if (Auth::user()->id == $user->user_id)
         <div class="content">
        <a class="js-modal-open" href="" post="{{ $user->post }}" post_id="{{ $user->id }}"><img src="images/edit.png"width="50" height="50"></a>
    </div>
@endif
 {!! Form::close() !!}


   <!-- モーダルの中身 -->
    <div class="modal js-modal">

        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
            <form action="/post/update/{$user->user->id}"  method="">
                <textarea name="upPost" class="modal_post" ></textarea>
                <input type="hidden" name="id" class="modal_id" value="">
            <!-- 更新ボタン -->
                <input type="submit" value="更新" onclick="return confirm('こちらの投稿で再投稿します。')">
           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>
        </div>



  @if (Auth::user()->id == $user->user_id)
<a class="btn-post" href="/post/{{$user->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"width="50" height="50"></a>



  @endif
@endforeach
@endsection


</body>
</html>
