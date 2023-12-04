<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">
      <h4>Octave Allegro</h4>
      <h6>Report System</h6>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        @guest
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('login') }}">
              <button class="btn btn-primary">Sign In</button>
            </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('register') }}">
              <button class="btn btn-success">Sign Up</button>
            </a>
          </li>
        @else
          <li class="nav-item">
            <a class="nav-link" href="/"><span>Welcome, {{ auth()->user()->username }}</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="{{ route('logout') }}">
              <button class="btn btn-danger">Sign Out</button>
            </a>
          </li>
        @endguest
      </ul>
    </div>
  </div>
</nav>
