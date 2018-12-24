
@extends('layouts.master')
@section('content')
  <h1> Index of products </h1>
  <hr>
  @foreach($products as $product)
    <hr>
    <ul>
      Name:
      <li>{{ $product->name }}</li>
      Description:
      <li>{{ $product->description }}</li>
      Price:
      <li>{{ $product->price }}</li>
      Brand:
      <li>{{ $product->brand }}</li>
      Quantity:
      <li>{{ $product->quantity }}</li>
      <li><a href={{ route('product.addToCart', ['id' => $product->id]) }} class="btn btn-success" role="button">Buy</a></li>
    </ul>
    <p> Name: {{ $product->name }} </p>


    @foreach($product->images as $path)
      <img src="{{ asset("storage/$path") }}" />
    @endforeach

    <hr>
  @endforeach

@endsection