@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/product.css') }}">
@endsection
@section('content')
  @if(Session::has('success'))
    <div class="row">
      <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <div id="charge-message" class="alert alert-success">
          {{ Session::get('success')}}
        </div>
      </div>
    </div>
  @endif

  {{-- <h1> Index of products </h1>
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
  @endforeach --}}











<div class="container">
    <h3 class="h3">Our products</h3>
    <div class="row">

     @foreach($products as $product)
          <div class="col-md-3 col-sm-6">
              <div class="product-grid">
                  <div class="product-image">
                      <a href="#">
                        @foreach($product->images as $path)
                          <img class="pic-1" src="{{ asset("storage/$path") }}" >
                        @endforeach

                        @foreach($product->images as $path)
                          <img class="pic-2" src="{{ asset("storage/$path") }}" >
                        @endforeach

                      </a>
                      <ul class="social">
                          {{-- <li><a href="" data-tip="Quick View"><i class="fa fa-search"></i></a></li> --}}
                          {{-- <li><a href="" data-tip="Add to Wishlist"><i class="fa fa-shopping-bag"></i></a></li> --}}
                          <li><a href={{ route('product.addToCart', ['id' => $product->id]) }} data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                      </ul>
                      {{-- <span class="product-new-label">Sale</span> --}}
                      {{-- <span class="product-discount-label">20%</span> --}}
                  </div>
                  {{-- <ul class="rating">
                      <li class="fa fa-star"></li>
                      <li class="fa fa-star"></li>
                      <li class="fa fa-star"></li>
                      <li class="fa fa-star"></li>
                      <li class="fa fa-star disable"></li>
                  </ul> --}}
                  <div class="product-content">
                      <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                      <div class="price">${{ $product->price }}
                          {{-- <span>$20.00</span> --}}
                      </div>
                      <a class="add-to-cart" href={{ route('product.addToCart', ['id' => $product->id]) }} role="button">+ Dodaj do koszyka</a>
                  </div>
              </div>
          </div>
      @endforeach







        </div>
    </div>
</div>
<hr>







@endsection