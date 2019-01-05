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


<div class="container">
    <h3 class="h3">Our products</h3>
    <div class="row">

     @foreach($products as $product)
          <div class="col-md-3 col-sm-6">
              <div class="product-grid">
                  <div class="product-image">
                      <a href={{ route('product.show', ['id' => $product->id]) }}>
                          <img class="pic-1" src="{{ asset("storage/".$product->images[0]) }}" >


                          <img class="pic-2" src="{{ asset("storage/".$product->images[1]) }}" >


                      </a>
                      <ul class="social">
                          <li><a href={{ route('product.show', ['id' => $product->id]) }} data-tip="Show this product"><i class="fa fa-shopping-cart"></i></a></li>
                          <li><a href={{ route('product.addToCart', ['id' => $product->id]) }} data-tip="Add to Cart"><i class="fa fa-shopping-cart"></i></a></li>
                      </ul>
                  </div>
                  <div class="product-content">
                      <h3 class="title"><a href="#">{{ $product->name }}</a></h3>
                      <div class="price">
                        ${{ $product->price }} | {{ $product->quantity }} left
                      </div>
                      <a class="add-to-cart" href={{ route('product.addToCart', ['id' => $product->id]) }} role="button">+ Dodaj do koszyka</a>
                      @if(Auth::check())
                        @if(Auth::user()->isAdmin())
                            <form action={{ route('product.destroy', ['id' => $product->id]) }} method="POST">
                                @method('DELETE')
                                @csrf
                              <button type="submit" class="btn btn-danger">Delete this product</button>
                            </form>
                        @endif
                      @endif
                  </div>
              </div>
          </div>
      @endforeach
        </div>
    </div>
</div>
<hr>







@endsection