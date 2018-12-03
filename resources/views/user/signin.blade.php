@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1>Sign in</h2>
      @if(count($errors) > 0)
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <p>{{ $error }} </p>
          @endforeach
        </div>
      @endif
      @include('partials.userform', [$routeName='user.signin', $actionName='Sign in'])
    </div>

  </div>
@endsection