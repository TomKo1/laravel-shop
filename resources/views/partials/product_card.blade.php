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
        @if(Auth::check())
              @if(!Auth::user()->isAdmin())
                <a class="add-to-cart-btn" href={{ route('product.addToCart', ['id' => $product->id]) }} role="button"><i class="fa"></i> Add to cart</a>
              @endif
                {{-- <a class="add-to-cart-btn btn" style="margin-top: 5px;" href={{ route('product.destroy', ['id' => $product->id]) }} role="button"><i class="fa"></i> Remove item</a> --}}

              @if(Auth::user()->isAdmin())
                <form action={{ route('product.destroy', ['id' => $product->id]) }} method="POST" style="margin-top: 5px;">
                    @method('DELETE')
                    @csrf
                  <button type="submit" class="btn btn-danger" style="mergin-top: 20px;">Delete this product</button>
                </form>
            @endif
          @endif
    </div>
</div>
<!-- /product -->
