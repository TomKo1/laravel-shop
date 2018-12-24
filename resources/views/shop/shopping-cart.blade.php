
@extends('layouts.master')
@section('content')
  @if(Session::has('cart'))
    <div class="row">
      <div class="col-sm-12 col-md-12 col-md-offset-3 col-sm-offset-3">
        <ul class="list-group">
          @foreach($products as $product)
          <li class="list-group-item">
              <span class="badge"> {{ $product['qty'] }} </span>
              <strong>{{ $product['item']['name'] }}</storng>
              <span class="label label-success"> {{ $product['price'] }} </span>
              <div class="btn-group">
                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href={{ route('product.removeFromCart', ['id' => $product['item']->id, 'quantity' => '1']) }}>Reduce by 1</a></li>
                  <li><a href={{ route('product.removeFromCart', ['id' => $product['item']->id, 'quantity' => $product['qty']]) }} >Remove all</a></li>
                </ul>
              </div>
            </li>
          @endforeach
        </ul>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-12 col-md-12 col-md-offset-3 col-sm-offset-3 align-self-center">
        <strong>Total: {{ $totalPrice }}</strong><br>
        <button type="button" class="btn btn-success">Checkout</button>
      </div>
    </div>
  @else
    <div class="row">
      <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
        <h2>No items in cart</h2>
      </div>
    </div>
  @endif

@endsection