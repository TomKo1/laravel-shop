@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/product.css') }}">
@endsection
@section('content')
<h1> Categories </h1>
  <div class="container">
    <div class="row">
      @foreach($categories as $category)
        <div class="col-md-3 col-sm-6">
          <div class="product-grid">
            <div class="product-image">
            <a href={{ route('category.products', ['id' => $category->id]) }}>
                <img class="pic-1" src="{{ asset("storage/$category->image") }}" >
                <img class="pic-2" src="{{ asset("storage/$category->image") }}" >
              </a>
              </div>

              <div class="product-content">
              <h3 class="title"><a href="#">{{ $category->name }}</a></h3>
                <a class="add-to-cart" href={{ route('category.products', ['id' => $category->id]) }} role="button">Zobacz produkty z tej kategorii</a>
                 @if(Auth::check())
                        @if(Auth::user()->isAdmin())
                            <form action={{ route('category.destroy', ['id' => $category->id]) }} method="POST">
                                @method('DELETE')
                                @csrf
                              <button type="submit" class="btn btn-danger">Delete this category</button>
                            </form>
                        @endif
                      @endif
              </div>
            </div>
        </div>
      @endforeach
    </div>
  </div>
<hr>


@endsection