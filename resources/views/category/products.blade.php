@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/product.css') }}">
@endsection
@section('content')
  <h1> Products for category {{ $category->name }}</h1>
  <hr>

<div class="container">
    <div class="row">

     @foreach($products as $product)
          <div class="col-md-3 col-sm-6">
              <div class="product-grid">
                  <div class="product-image">
                      <a href="#">
                          <img class="pic-1" src="{{ asset('storage/'.$product->images[0]) }}" >

                          <img class="pic-2" src="{{ asset('storage/'.$product->images[1]) }}" >

                      </a>
                      <ul class="social">
                          <li><a href={{ route('product.addToCart', ['id' => $product->id]) }} data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                      </ul>
                  </div>
                  <div class="product-content">
                      <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                      <div class="price">
                        ${{ $product->price }}
                      </div>
                      <a class="add-to-cart" href={{ route('product.addToCart', ['id' => $product->id]) }} role="button">+ Dodaj do koszyka</a>
                  </div>
              </div>
          </div>
      @endforeach
        </div>
    </div>
</div>


@endsection
