@extends('layouts.login')

@section('content')
<h2><!DOCTYPE html>
<html>
<body>
      <div class="form-group">
  <!--投稿フォーム-->
 {!! Form::open(['url' => '/post']) !!}
      {!! Form::input('text', 'newPost', null, ['required', 'class' => 'form-control', 'placeholder' => 'ツイート']) !!}

  </div>
  <!--投稿ボタン-->
        <button type="submit" class="btn-post"><img src="images/post.png"width="100" height="100"></button><br><br>
     {!! Form::close() !!}
         @foreach ($list as $list)
      <p> <td>{{ $list->id }}</td><br>{{ $list->post }}{{ $list->created_at }}<br></p>
        <!-- 投稿の編集ボタン -->
         <div class="content">
        <a class="js-modal-open" href="" post="{{ $list->post }}" post_id="{{ $list->id }}">編集</a>
    </div>

    </div>

   <!-- モーダルの中身 -->
 <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
           <form action="{{ url('post/update/') }}/{{$list->id}}"  method="update">
                <textarea name="" class="modal_post"></textarea>   <!--フォーム-->
                <input type="hidden" name="" class="modal_id" value="">
                <input type="submit" value="更新" onclick="return confirm('こちらの投稿で再投稿します。')"> <!--更新ボタン-->


           </form>
           <a class="js-modal-close" href="">閉じる</a>
        </div>

    </div>
      <!-- 消去ボタン-->
      <td><a class="btn-post" href="/post/{{$list->id}}/delete" onclick="return confirm('こちらの投稿を削除してもよろしいでしょうか？')"><img src="images/trash-h.png"width="50" height="50"></a></td>

    </div>

</body>
@endforeach
@endsection
</html>
