@extends('layouts.login')

@section('content')

{!! Form::close() !!}
@foreach ($user as $user)
<!--ユーザー以外表示-->
@if ($user->id !== Auth::user()->id)


<div>{{ $user->username }}
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

     </form>
         @endif
    </div>
   </div>
  </div>
 </div>
</div>

@endif
@endforeach
@endsection
