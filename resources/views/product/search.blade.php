@extends('layouts.master')

@section('content')
    @include('partials.products', ['products' => $products, 'title' => 'Results:'])
@endsection