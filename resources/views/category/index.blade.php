@extends('layouts.master')
@section('content')
  <h1> Index of categories </h1>
  <hr>
  @foreach($categories as $category)
    <hr>
    <ul>
      Name:
      <li>{{ $category->name }}</li>
      Description:
      <li>{{ $category->description }}</li>
      Image:
      <li><img src={{ asset("storage/$category->image") }} /></li>
      Products from this category:
      <li><a href={{ route('category.products', ['id' => $category->id] ) }}>Products from this category</a></li>
    </ul>
    <hr>
  @endforeach

@endsection