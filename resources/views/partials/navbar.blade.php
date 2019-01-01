<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href={{ route('category.index') }}>Categories</a>
            </li>
            @if(Auth::check())
                @if(Auth::user()->isAdmin())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin options
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href={{ route('category.create') }}>Create new category</a>
                                <a class="dropdown-item" href={{ route('product.new') }}>Create new product</a>
                            </div>
                        </li>
                @endif
            @endif
        </ul>
    </div>

    @if(Auth::check())
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a href={{ route('product.shoppingCart') }} class="btn nav-link bg-dark" role="button">
                        Cart
                        <span class="badge badge-danger">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                </li>
                <li>
                    <a class="btn nav-link bg-dark" role="button" href="{{ route('user.profile', [ 'id' => Auth::user()->id ]) }}">Profile</a>
                </li>
                <li>
                     <a class="btn nav-link bg-dark" role="button" href="{{ route('user.logout') }}">Log out</a>
                </li>
            </ul>
        </div>
    @else
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="btn nav-link bg-dark" role="button" href="{{ route('user.signin') }}">Sign in</a>
                </li>
                <li>
                    <a class="btn nav-link bg-dark" role="button" href="{{ route('user.signup') }}">Sign up</a>
                </li>
            </ul>
        </div>
    @endif
</nav>
