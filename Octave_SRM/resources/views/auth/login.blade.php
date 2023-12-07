@extends('layout.main')

@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header" style="background-color: rgb(204, 231, 255)"><center><b>Sign In</b></center></div>
                  <div class="card-body">
  
                      <form action="{{ route('login.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address:</label>
                              <div class="col-md-6">
                                  <input type="text" id="email" class="form-control" placeholder="Enter your email" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <div class="alert alert-danger">
                                        <ul>
                                            <li>{{ $errors }}</li>
                                        </ul>
                                      </div>
                                  @endif
                              </div>
                          </div>
                          <br>
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" placeholder="Enter your password" name="password" required>
                                  @if ($errors->has('password'))
                                  <div class="alert alert-danger">
                                    <ul>
                                            <li>{{ $errors->first('password') }}</li>
                                    </ul>
                                </div>
                                  @endif
                              </div>
                          </div>
                          <br>
                          <div class="form-group row">
                              <div class="col-md-6 offset-md-4">
                                  <div class="checkbox">
                                      <label>
                                          <input type="checkbox" name="remember"> Remember Me
                                      </label>
                                  </div>
                              </div>
                          </div>
                          <br>
                          <div class="col-md-6 offset-md-4">
                              <button type="submit" class="btn btn-primary">
                                  Sign In
                              </button>
                          </div>
                      </form>
                        
                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection