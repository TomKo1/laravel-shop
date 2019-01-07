@extends('layouts.master')

@section('content')
  <!-- SECTION -->
<div class="section">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">

      <div class="col">

      <!-- Order Details -->
      <div class="col order-details">
        <div class="section-title text-center">
          <h3 class="title">Your Order</h3>
        </div>

        <div class="order-summary">
          <div class="order-col">
            <div><strong>PRODUCT</strong></div>
            <div><strong>TOTAL</strong></div>
          </div>
          <div class="order-products">
            <div class="order-col">

                @foreach($products as $product)
                  <div> {{ $product['qty'] }} x {{ $product['item']['name'] }}</div>
                  <div>
                      <div class="btn-group">
                <button type="button" class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                <ul class="dropdown-menu">
                  <li><a href={{ route('product.removeFromCart', ['id' => $product['item']->id, 'quantity' => '1']) }}>Reduce by 1</a></li>
                  <li><a href={{ route('product.removeFromCart', ['id' => $product['item']->id, 'quantity' => $product['qty']]) }} >Remove all</a></li>
                </ul>
              </div>
                  </div>
                  <div>${{ $product['price'] }}</div>
                @endforeach

            </div>
              </div>



        <a  href={{ route('checkout') }} type="button" class="primary-btn order-submit">Checkout!</a>
      </div>
      <!-- /Order Details -->
    </div>
    <!-- /row -->
  </div>
  <!-- /container -->
</div>
</div>
<!-- /SECTION -->



@endsection
