@extends('layouts.app')
@section('content')
  <h3>Mensaje id: {{ $message->id }}</h3>
  <img class="img-thumbnail" src="{{ $message->image }}">
  <p class="card-text">{{ $message->content }}</p>
@endsection