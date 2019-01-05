@extends('layouts.master')
@section('content')

<h1> {{ $product->name }} </h1>
  <div class="container">
    <div class="row">
      <div class="col">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img class="d-block w-100" src={{ asset("storage/".$product->images[0]) }} alt="First slide">
            </div>
            @foreach($product->images as $image)
              @if($loop->first) @continue @endif
              <div class="carousel-item">
                <img class="d-block w-100" src={{ asset("storage/".$image) }} alt="Second slide">
              </div>
            @endforeach
          </div>

          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>

      </div>

      <div class="col">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">Name</th>
              <td>{{ $product->name }}</td>
            </tr>
            <tr>
              <th scope="row">Description</th>
              <td>{{ $product->description }}</td>
            </tr>
            <tr>
              <th scope="row">Price</th>
              <td>{{ $product->price }}$</td>
            </tr>
            @if(Auth::check() && !Auth::user()->isAdmin())
              <tr>
                <th></th>
                <td><a href={{ route('product.addToCart', ['id' => $product->id]) }}  role="button" class="btn btn-success" > Add to cart </a></td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
  </div>





  </div>
@endsection