@extends('layouts.login')

@section('content')

@foreach ($images as $images)

@if ($images->id !== Auth::user()->id)

<a href="{{ url('/profile_users',$images->id) }}"><img src="{{ asset('/storage/images/'.$images->images) }}"  class="rounded-circle" width="50" height="50"></a>

@endif
@endforeach

@foreach ($post->unique('user_id')  as $posts)

<br>{{ $posts->post }}</br>


@endforeach

@foreach ($user as $user)
<!--ユーザー以外表示-->
@if ($user->id !== Auth::user()->id)

<div><a href="{{ url('/profile_users',$user->id) }}"><img src="{{ asset('/storage/images/'.$user->images) }}"  class="rounded-circle" width="50" height="50"></a>
 {{ $user->username }}
{{ $user->created_at}}
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="ml-2 d-flex flex-column">
<!--フォローボタン-->
@if (auth()->user()->isFollowing($user->id))
     <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
         {{ csrf_field() }}
        {{ method_field('DELETE') }}
         <button type="submit" class="btn btn-danger btn-sm">フォロー解除</button>
     </form>
       @else
     <form action="{{ url('/search/follow/'.$user->id) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn btn-primary btn-sm">フォローする</button>

     </form>@endif

    </div>
   </div>
  </div>
 </div>
</div>

@endif
@endforeach
@endsection
