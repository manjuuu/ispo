@extends('app')
@section('content')

<h2>{{ $exception->getMessage() }}</h2>


<!-- this msg that we are getting form Handler.php in render method App/Exceptions/Handler.php -->

@endsection