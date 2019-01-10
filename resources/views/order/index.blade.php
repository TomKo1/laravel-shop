@extends('layouts.master')
@section('content')
  <div class="section">
    <div class="container">
        <h1 class="text-center"> All orders</h1>

        @include('partials.order', $orders)

    </div>
  </div>


@endsection