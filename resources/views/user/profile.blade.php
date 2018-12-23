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
@endsection