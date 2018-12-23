<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">Shop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown link
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
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
</nav>
