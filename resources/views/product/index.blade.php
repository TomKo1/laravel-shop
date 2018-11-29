
@extends('layouts.master')
@section('content')
  <h1> Index of products </h1>
  <hr>
  @foreach($products as $product)
    <hr>
    {{ $product->name }}
    <hr>
  @endforeach

@endsection