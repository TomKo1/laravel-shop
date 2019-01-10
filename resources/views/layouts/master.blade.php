<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Sample electronics shop</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link rel="stylesheet" href="{{ URL::to('css/bootstrap.min.css') }}">

		<!-- Slick -->
		<link rel="stylesheet" href="{{ URL::to('css/slick.css') }}">
		<link rel="stylesheet" href="{{ URL::to('css/slick-theme.css') }}">

		<!-- nouislider -->

		<link rel="stylesheet" href="{{ URL::to('css/nouislider.css') }}">

		<!-- Font Awesome Icon -->
		<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

		<!-- Custom stlylesheet -->
		<link rel="stylesheet" href="{{ URL::to('css/style.css') }}">

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

		@yield('css')

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +48 42 556 543 342</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> samplel@gmail.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Kwiatowa 9</a></li>
					</ul>
					<ul class="header-links pull-right">
						@if(Auth::check())
							<li><a href="{{ route('user.profile', [ 'id' => Auth::user()->id ]) }}">Profile</a></li>
							<li><a href="{{ route('user.logout') }}">Log out</a></li>
							@if(Auth::user()->isAdmin()))
							<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Admin options
									</a>
									<div class="dropdown-menu" style="background: black;">
										<a class="dropdown-item" href={{ route('category.create') }}>Create new category</a>
										<a class="dropdown-item" href={{ route('product.new') }}>Create new product</a>
										<a class="dropdown-item" href={{ route('order.index') }}>Inspect all orders</a>
										<a class="dropdown-item" href={{ route('user.index') }}>Manage all users</a>
									</div>
								</li>
							@endif
						@else
							<li><a href="{{ route('user.signin') }}">Sign in</a></li>
							<li><a href="{{ route('user.signup') }}">Sign up</a></li>
						@endif
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->
			<!-- MAIN HEADER -->
<div id="header">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- LOGO -->
			<div class="col-md-3">
				<div class="header-logo">
					<a href="#" class="logo">
						<img src="./img/logo.png" alt="">
					</a>
				</div>
			</div>
			<!-- /LOGO -->




			<!-- SEARCH BAR -->
			<div class="col-md-6">
				<div class="header-search">
					<form>
						<select class="input-select">
						</select>
						{{-- Note script in main.js! --}}
						<input class="input" id="search_input" placeholder="Search here" name="query">
						<a role="button" class="btn search-btn" href={{ route('product.search', ['query' => 'd'])}} id="search_link">Search</a>
					</form>
				</div>
			</div>
			<!-- /SEARCH BAR -->



			<!-- ACCOUNT -->
			<div class="col-md-3 clearfix">
				<div class="header-ctn">
						@if(Auth::check() && !Auth::user()->isAdmin())
						<!-- Cart -->
						<div class="dropdown">
							<a href={{ route('product.shoppingCart') }} >
								<i class="fa fa-shopping-cart"></i>
								<span>Your Cart</span>
								<div class="qty">{{ Session::has('cart') ? Session::get('cart')->totalQty : '0' }}</div>
							</a>
						</div>
						<!-- /Cart -->
						@endif

					<!-- Menu Toogle -->
					<div class="menu-toggle">
						<a href="#">
							<i class="fa fa-bars"></i>
							<span>Menu</span>
						</a>
					</div>
					<!-- /Menu Toogle -->
				</div>
			</div>
			<!-- /ACCOUNT -->
		</div>
		<!-- row -->
	</div>
	<!-- container -->
</div>
<!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->


           <!-- Main content -->

            @yield('content')


			<!-- /Main content-->



		<!-- FOOTER -->
		<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">About Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut.</p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>Kwiatowa 9</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+48 42 556 543 32</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>sample@gmail.com</a></li>
								</ul>
							</div>
						</div>
					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><i class="fa fa-credit-card"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-paypal"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-mastercard"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-discover"></i></a></li>
								<li><a href="#"><i class="fa fa-cc-amex"></i></a></li>
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
		<!-- /FOOTER -->

		<!-- jQuery Plugins -->
		<script src= {{ URL::to('js/jquery.min.js') }}></script>
		<script src= {{ URL::to('js/bootstrap.min.js') }}></script>
		<script src= {{ URL::to('js/slick.min.js') }}></script>
		<script src= {{ URL::to('js/nouislider.min.js') }}></script>
		{{-- <script src= {{ URL::to('js/jquery.zoom.min.js') }}></script> --}}
		<script src= {{ URL::to('js/main.js') }}></script>
		@yield('scripts')

	</body>
</html>
