<input type="text" placeholder="Search here">


@foreach ($products as $product)
    {{ $product->name }}
@endforeach