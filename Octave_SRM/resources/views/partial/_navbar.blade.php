<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/"><button id="home"><h4> Octave Allegro</h4><h6>Report System</h6></button></a>
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
    </div>
        <ul class="nav navbar-nav navbar-right justify-content-end">
          @guest
              <li class="active nav-item">
                  <a class="" href="{{ route('login') }}"><button class="btn btn-primary">Sign In</button></a>
              </li>
              <li class="active nav-item">
                  <a class="nav-link" href="{{ route('register') }}"><button class="btn btn-success">Sign Up</button></a>
              </li>
          @else
              <li>
                  <a href="/"><button id="home">Welcome, {{ auth()->user()->username }}</button></a>
              </li>
              <li class="active nav-item">
                  <a class="nav-link" href="{{ route('logout') }}"><button class="btn btn-danger">Sign Out</button></a>
              </li>
          @endguest
      </ul>
</div>
</nav>
