@extends('layouts.master')

@section('content')

	<!-- SECTION -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<div class="product-preview">

							<div class="product-preview">
								<img src="{{ asset("storage/".$product->images[0]) }}" >
							</div>

						</div>
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						@foreach ($product->images as $image)
							<div class="product-preview">
								<img src="{{ asset("storage/".$image) }}" >
							</div>
						@endforeach
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name">{{ $product->name }}</h2>

						<div>
							<h3 class="product-price">${{ $product->price }}</h3>
							<span class="product-available">{{ $product->quantity }} in stock</span>
						</div>
						<p>{{ $product->description }}</p>

						<ul class="product-links">
							<li>Category:</li>
							@foreach ($categories_names as $category)
								<li><a href={{ route('category.products', ['id' => $category->id]) }}>{{ $category->name }}</a></li>
							@endforeach
						</ul>



					</div>
				</div>
				<!-- /Product details -->


			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /SECTION -->

	<!-- Section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<div class="row">

				<div class="col-md-12">
					<div class="section-title text-center">
						<h3 class="title">Related Products</h3>
					</div>
				</div>

				@foreach ($related_products as $product)

					<!-- product -->
					<div class="col-md-3 col-xs-6">
							@include('partials.product_card', ['product' => $product])
					</div>
					<!-- /product -->

				@endforeach


			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /Section -->



@endsection

{{-- @section('scripts')
@endsection --}}
