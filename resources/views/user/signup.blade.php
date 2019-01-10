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

      <form action="{{ route('user.signup') }}" method="post">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="surname">Surname</label>
            <input type="text" id="surname" name="surname" class="form-control">
        </div>
        <h2>Addresses:</h2>
        <table class="table table-bordered" id="dynamic_field">
            <tr>
                <td><input type="text" name="street[]" placeholder="Street" class="form-control name_street" /></td>
                <td><input type="text" name="city[]" placeholder="City Name" class="form-control name_city" /></td>
                <td><input type="text" name="zip[]" placeholder="Zip Code" class="form-control zip_code" /></td>
                <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>
            </tr>
        </table>

        <button type="submit" class="primary-btn order-submit form-control" style="margin-bottom: 30px;">Sign up</button>
        {{ csrf_field() }}
      </form>

    </div>

  </div>
@endsection


@section('scripts')
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>
  <script type="text/javascript" src="{{ URL::to('js/dynamic_field.js') }}"></script>
@endsection