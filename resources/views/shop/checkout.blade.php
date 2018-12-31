@extends('layouts.master')
@section('css')
  <link rel="stylesheet" href="{{ URL::to('css/stripe.css') }}">
@endsection

@section('content')
  <div class="row">
    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
      <h1>Checkout</h1>
      <h4>Your total: ${{ $totalPrice }}</h4>
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
          <div class="form-row">
            <select id="address" name="address">
              @foreach ($addresses as $address)
                <option value={{ $address->id }}>{{ $address->street }}</option>
              @endforeach
            </select>
          </div>
              {{ csrf_field() }}
          <button class="btn btn-success" >Submit Payment</button>
      </form>
@endsection

@section('scripts')
  <script src="https://js.stripe.com/v3/"></script>
  <script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
@endsection


