@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/stripe.css') }}">
@endsection

@section('content')

<div class="card  mb-3 mt-3" >
  <div class="card-header text-center">Checkout</div>
  <div class="card-body">
    <h5 class="card-title">Total: ${{ $totalPrice }}</h5>
    <div class="card-text">
        <form action={{ route('checkout') }} method="post" id="payment-form">
        <div class="form-row">
          <label for="card-element">
            Credit or debit card
          </label>
          <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
          </div>

          <!-- Used to display form errors. -->
          <div id="card-errors" role="alert"></div>
          </div>
          <div class="form-row mt-3 mb-3">
            <label for="address">Address of delivery</label>
            <select id="address" name="address" class="form-control">
              @foreach ($addresses as $address)
                <option value={{ $address->id }}>{{ $address->street }}</option>
              @endforeach
            </select>
          </div>
              {{ csrf_field() }}
          <button class="btn btn-success form-control" >Submit Payment</button>
      </form>
    </div>
  </div>
</div>
@endsection

@section('scripts')
  <script src="https://js.stripe.com/v3/"></script>
  <script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection


