@extends('layouts.app')

@section('content')
  <h1>{{ $user->username }}</h1>
  <a class="btn btn-link" href="{{ url('users', $user->username).'/follows' }}">Sigue a <span class = "badge badge-default">{{ $user->follows->count() }}</span></a>
  <a class="btn btn-link" href="{{ url('users', $user->username).'/followers' }}">Seguidores <span class = "badge badge-default">{{ $user->followers->count() }}</span></a>
  @if(Auth::check())
    @if(Auth::user()->isFollowing($user))
      <form action="{{ url('users', $user->username).'/unfollow' }}" method="post">
        {{ csrf_field() }}
        <button class="btn btn-danger">Dejar de seguir</button>
        @if(Session::get('success'))
            <span class="text-success">{{ Session::get('success') }}</span>
        @endif
      </form>
    @else
      <form action="{{ url('users', $user->username).'/follow' }}" method="post">
        {{ csrf_field() }}
        <button class="btn btn-primary">Seguir</button>
        @if(Session::get('success'))
            <span class="text-success">{{ Session::get('success') }}</span>
        @endif
      </form>
    @endif
  @endif
  <div class="row">
    @foreach($user->messages as $message)
      <div class="col-6">
        @include('messages.message')
      </div>
    @endforeach
  </div>
@endsection