@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1>Sign up</h2>
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <p>{{ $error }} </p>
          @endforeach
        </div>
      @endif
      @include('partials.userform', [$routeName='user.signup',  $actionName='Sign up'])
    </div>

  </div>
@endsection