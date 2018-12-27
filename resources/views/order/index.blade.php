@extends('layouts.master')
@section('content')
  <h1> Index of Orders </h1>
  <hr>
  @foreach($orders as $order)
    <hr>
    <br>
    {{ $order->address }}
    <br>
    {{ $order->name }}
    <br>
    {{ $order->cart }}
    <hr>
  @endforeach

@endsection