@extends('layouts.master')
@section('content')
  <h1> Index of Orders </h1>
  <hr>

  @include('partials.order', $orders)


@endsection