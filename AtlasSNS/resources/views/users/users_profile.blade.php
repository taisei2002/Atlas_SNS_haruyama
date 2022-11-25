@extends('layouts.login')

@section('content')

<div class = "main-profile-users">
<div class = "profile-users">
<img src="{{ asset('/storage/images/'.$profile->images) }}"  class="rounded-circle" width="50" height="50">
name<span class = "text-profile">{{ $profile->username }}</span>

<br>　 　　bio<span class = "text-profile">　{{ $profile->bio }}</span>

</div>


@if (auth()->user()->isFollowing($profile->id))
<div class="profile-follow-btn">
     <form action="{{ route('unfollow', ['id' => $profile->id]) }}" method="POST">
         {{ csrf_field() }}
        {{ method_field('DELETE') }}
         <button type="submit" class="search-btn-unfollow">フォロー解除</button>
     </form>

       @else
<div class="profile-follow-btn">
     <form action="{{ url('/search/follow/'.$profile->id) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn-following">フォローする</button>

     </form>
         @endif
  </div>
  </div>
<h1 class =  "main_border"></h1>

@foreach ($user as $user)
<!--ユーザー以外表示-->



   <div class="frame">
<img src="{{ asset('/storage/images/'.$user->images) }}"  class="rounded-circle" width="50" height="50">
<span class="left">{{ $user->username}}</span>
<span class="right">{{ $user->created_at}}　　</span>
  </div>
<p class="right">  {{ $user->post }}</p>
  <hr class="style1">



@endforeach
@endsection
