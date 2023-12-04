<nav class="navbar navbar-expand-lg navbar-light">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/"><h4> Octave Allegro</h4><h6>Report System</h6></a>
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
    </div>
        <ul class="nav navbar-nav navbar-right">
          @guest
              <li class="active nav-item">
                  <a class="" href="{{ route('login') }}"><button class="btn btn-primary"><span></span>Sign In</button></a>
              </li>
              <li class="active nav-item">
                  <a class="nav-link" href="{{ route('register') }}"><button class="btn btn-success"><span></span>Sign Up</button></a>
              </li>
          @else
              <li>
                  <a href="/"></span>Welcome, {{ auth()->user()->username }}</a>
              </li>
              <li class="active nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"><button class="btn btn-danger"><span></span>Sign Out</button></a>
              </li>
          @endguest
      </ul>
</div>
</nav>
