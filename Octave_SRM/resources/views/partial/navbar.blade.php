<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style type="text/css">
        @import url(https://fonts.googleapis.com/css?family=Raleway:300,400,600);
    </style>
</head>
<body>

<nav class="navbar sticky-top navbar-fixed-top navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><h4> Octave Allegro</h4><h6>Report System</h6></a>
      {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button> --}}
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="nav navbar-nav navbar-right">
          @guest
              <li class="nav-item">
                  <a class="" href="{{ route('login') }}">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('register') }}">Register</a>
              </li>
          @else
              <li>
                  <a href="/">Welcome, {{ auth()->user()->username }}</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="{{ route('logout') }}">Logout</a>
              </li>
          @endguest
      </ul>
      </div>
    </div>
  </nav>
  @yield('content')

</body>
</html>
