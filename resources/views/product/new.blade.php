@extends('layouts.master')
@section('content')
  <div class="row">
    <div class="col-md-4 col-md-offset-4">
      <h1>Create new product</h2>
      @if(count($errors) > 0)
      <div class="alert alert-danger">
      @foreach($errors->all() as $error)
      <p>{{ $error }} </p>
      @endforeach
      </div>
      @endif
      <form action="{{ route('product.new') }}" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" placeholder="Name" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Description</label>
          <textarea name="description" rows="4" cols="50" class="form-control" >Description</textarea>
        </div>
        <div class="form-group">
          <label for="price">Price</label>
          <input type="number" min="0.01" max="1000000" step="0.01" id="price" name="price" class="form-control">
        </div>
        <div class="form-group">
          <label for="brand">Brand</label>
          <input type="text" id="brand" name="brand" placeholder="Brand" class="form-control">
        </div>
        <div class="form-group">
          <label for="quantity">Quantity</label>
          <input type="number" min="1" max="1000000" id="quantity" name="quantity" class="form-control">
        </div>

       <h2>Categories:</h2>
        <select id="categories" name="categories[]" multiple>
            @foreach ($categories as $category)
              <option value={{ $category->id }}>{{ $category->name }}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="image">Image</label>
            <input required type="file" class="form-control" name="images[]" placeholder="address" multiple>
         </div>

        <button type="submit" class="btn btn-primary">Create</button>
        {{ csrf_field() }}
      </form>
    </div>

  </div>
@endsection