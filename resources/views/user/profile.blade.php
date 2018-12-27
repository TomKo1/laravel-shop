@extends('layouts.master')
@section('content')
  <h1>Here is the profile view!</h1>
  {{ $user->email }}

  <h2>Addresses:</h2>
  @foreach($addresses as $address)
    Street: {{ $address->street }}
    <br>
    Zip code: {{ $address->zip_code }}
    <br>
    City: {{ $address->city }}
    <br>
  @endforeach
  <br>
  <a href="{{ route('user.logout') }}">Logout</a>

  <hr>
  <h2>Your orders:</h2>
  <hr>

  @include('partials.order', $orders)


  <hr>
  <h2>Addresses</h2>
  <hr>
  @foreach ( $addresses as $address)
    <hr><br>
      {{ $address->street }}
      <br>
      {{ $address->zip_code }}
      <br>
      {{ $address->city }}
    <hr>
  @endforeach

@endsection