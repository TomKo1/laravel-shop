@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1>Create new category</h2>
      @if(count($errors) > 0)
      <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <p>{{ $error }} </p>
      @endforeach
      </div>
      @endif
      <form action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Name" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Description</label>
          <textarea name="description" rows="4" cols="50" class="form-control" >Description</textarea>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input required type="file" class="form-control" name="image" placeholder="address">
         </div>

        <button type="submit" class="primary-btn order-submit form-control" style="margin-bottom: 10px;" >Create</button>
        {{ csrf_field() }}
      </form>
    </div>

  </div>
@endsection