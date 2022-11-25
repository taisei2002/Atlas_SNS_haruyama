@extends('layouts.login')

@section('content')
<!--{!! Form::open(['method' => 'GET']) !!}
    {!! Form::text('keyword', null) !!}
    {!! Form::submit('検索') !!}
-->


<div class = "search-btn-icon">
 <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" width="50" height="50">
</div>

<form id="form1" action="" method="get" class="search_container">
<input name="keyword" type="text" placeholder="     ユーザー名" >　　
<input type="submit" value="&#xf002" width="50" height="50">

</form>
@if(!empty($keyword))

検索したワード　:{{$keyword}}
{!! Form::close() !!}
@endif
@foreach ($user as $user)
<!--ユーザー以外表示-->

@if ($user->id !== Auth::user()->id)
<div class = "search-users" >
<div><a href="{{ url('/profile_users',$user->id) }}"><img src="{{ asset('/storage/images/'.$user->images) }}"  class="rounded-circle" width="50" height="50"></a>
   <a class="comment-name">{{ $user->username }}</a>
 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-8">
    <div class="ml-2 d-flex flex-column">
<!--フォローボタン-->
@if (auth()->user()->isFollowing($user->id))
<div class="follow-btn">
     <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
         {{ csrf_field() }}
        {{ method_field('DELETE') }}
         <button type="submit" class="search-btn-unfollow">フォロー解除</button>
     </form>
       @else
 <div class="follow-btn">
     <form action="{{ url('/search/follow/'.$user->id) }}" method="POST">
        {{ csrf_field() }}
        <button type="submit" class="btn-following">フォローする</button>
     </form>
         @endif
        </div>
    </div>
   </div>
  </div>
 </div>
 </div>
</div>
@endif

@endforeach

@endsection
