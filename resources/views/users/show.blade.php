@extends('layouts.app')

@section('content')
  <h1>{{ $user->username }}</h1>
  {{--  <form action="{{ url('users', $user->username).'/follows/' }}" method="post">  --}}
  <form action="/laravel/users/{{ $user->username}}/follow" method="post">
    {{ csrf_field() }}
    <button class="btn btn-primary">Follow</button>
    @if(Session::get('success'))
        <span class="text-success">{{ Session::get('success') }}</span>
    @endif
  </form>
  <div class="row">
    @foreach($user->messages as $message)
      <div class="col-6">
        @include('messages.message')
      </div>
    @endforeach
  </div>
@endsection