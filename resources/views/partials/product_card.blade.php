<!-- product -->
<div class="product">
        <div class="product-img" style="height: 200px;">
            {{-- <img src="{{ asset("storage/".str_replace(str_split('["'), '',explode(',',$product->images))[0]) }}" > --}}
            <img src="{{ asset("storage/".$product->images[0]) }}" >
        </div>
    <div class="product-body">
        {{-- <p class="product-category">Category</p> --}}
        <h3 class="product-name"><a href={{ route('product.show', ['id' => $product->id]) }}>{{ $product->name }}</a></h3>
        <h4 class="product-price">${{ $product->price }}</h4>
    </div>
    <div class="add-to-cart">
        {{-- fa-shopping-cart --}}
            <a class="add-to-cart-btn" href={{ route('product.addToCart', ['id' => $product->id]) }} role="button"><i class="fa"></i> Add to cart</a>
    </div>
</div>
<!-- /product -->
