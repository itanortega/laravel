@extends('layouts.app')
@section('content')
  <h3>Mensaje id: {{ $message->id }}</h3>
  @include('messages.message')
@endsection