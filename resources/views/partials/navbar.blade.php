<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Shop</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                @if(Auth::check())
                  <a class="dropdown-item" href="{{ route('user.profile', [ 'id' => Auth::user()->id ]) }}">Profile</a>
                  <a class="dropdown-item" href="{{ route('user.logout') }}">Log out</a>
                @else
                  <a class="dropdown-item" href="{{ route('user.signin') }}">Sign in</a>
                   <a class="dropdown-item" href="{{ route('user.signup') }}">Sign up</a>
                @endif
              </div>
            </li>
        </ul>
    </div>

    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
        <ul class="navbar-nav ml-auto">
            <li>
                <a href={{ route('product.shoppingCart') }} class="btn nav-link bg-dark" role="button">
                    Cart
                    <span class="badge badge-danger">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
        </ul>
    </div>
</nav>
