@extends('layouts.login')

@section('content')

<h3 class = "Follow-font">Follower List
<div class = "follow-list-images">
@foreach ($images as $images)
<a href="{{ url('/profile_users',$images->id) }}"><img src="{{ asset('/storage/images/'.$images->images) }}"  class="rounded-circle" width="50" height="50"></a>
@endforeach
</div>
</h3>

    <h1 class =  "main_border"></h1>
@foreach ($posts  as $post)

 <div class="frame">
     <a href="{{ url('/profile_users',$post->user->id) }}"><img src="{{ asset('/storage/images/'.$post->user->images) }}" alt="mitsuruog" class="rounded-circle"width="50" height="50"></a>
    <span class="left">　　{{ $post->user->username}}</span>
     <span class="right" text-size>{{ $post->user->created_at}}　</span>
  </div>
  <p class="right">　　{{ $post->post}}</p>
  <hr class="style1">

@endforeach


@endsection
