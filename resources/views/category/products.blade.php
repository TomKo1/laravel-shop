@extends('layouts.master')
@section('content')
  <h1> Products for category {{ $category->name }}</h1>
  <hr>
  @foreach($products as $product)
    <hr>
    <ul>
      Name:
      <li>{{ $product->name }}</li>
      Description:
      <li>{{ $product->description }}</li>
    </ul>
    <hr>
  @endforeach
@endsection
