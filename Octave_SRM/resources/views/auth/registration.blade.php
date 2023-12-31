@extends('layout.main')

@section('content')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header" style="background-color: rgb(205, 255, 204)"><center><b>Sign Up</b></center></div>
                  <div class="card-body">
  
                      <form action="{{ route('register.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="username" class="col-md-4 col-form-label text-md-right">Username:</label>
                              <div class="col-md-6">
                                  <input type="text" id="username" class="form-control" placeholder="Enter your name" name="username" required autofocus>
                                  @if ($errors->has('username'))
                                      <span class="text-danger">{{ $errors->first('username') }}</span>
                                  @endif
                              </div>
                          </div>
                          <br>
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail:</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" placeholder="Enter Email" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                        <br>
                          <div class="form-group row">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password:</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" placeholder="Enter password" name="password" required>
                                  @if ($errors->has('password'))
                                      <span class="text-danger">{{ $errors->first('password') }}</span>
                                  @endif
                              </div>
                          </div>
                          <br>
                          <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right">Department:</label>
                            <div class="col-md-6">
                                <select id="department" class="form-control" name="department" required>
                                    <option value="">Select Department</option>
                                    <option value="IT">IT</option>
                                    <option value="HR">Human Resource</option>
                                    <option value="Logistic">Logistic</option>
                                    <option value="Engineering">Engineering</option>
                                    <option value="RnD">Research and Development</option>
                                    <option value="FA">Finance and Accounting</option>
                                    <option value="Sales">Sales</option>
                                    <option value="BD">Business Development</option>
                                    <option value="PPIC">Production, Planning, Inventory Control</option>
                                </select>
                                @if ($errors->has('department'))
                                    <span class="text-danger">{{ $errors->first('department') }}</span>
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
                              <button type="submit" class="btn btn-success">
                                  Sign Up
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