<nav class="navbar sticky-top navbar-fixed-top navbar-light">
    <div class="container">
      <a class="navbar-brand" href="/">Octave Allegro<br>Report System</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Sign In") ? 'active' : '' }}" href="/login">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ ($title === "Sign Up") ? 'active' : '' }}" href="/register">Sign Up</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>