@extends('templates.layouts.base')



@section('content')



  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="card card-primary">
              <div class="card-header">
                <h4>Se connecter</h4>
              </div>
              <div class="card-body">
                <form method="POST" action="{{ route("login") }}" class="needs-validation" novalidate="">

                  @csrf

                  <div class="form-group">
                    <label for="name">Login</label>
                    <input id="name" type="text" class="form-control" name="name" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your login
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="d-block">
                      <label for="password" class="control-label">Mot de passe</label>
                      <div class="float-right">
                        <a href="auth-forgot-password.html" class="text-small">
                          Mot de passe oublie?
                        </a>
                      </div>
                    </div>
                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                      <label class="custom-control-label" for="remember-me">Souviens-toi de moi</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                     Se connecter
                    </button>
                  </div>
                </form>
                <div class="row sm-gutters">
                </div>
              </div>
            </div>
<!--            <div class="mt-5 text-muted text-center">-->
<!--              Don't have an account? <a href="auth-register.html">Create One</a>-->
<!--            </div>-->
          </div>
        </div>
      </div>
    </section>
  </div>

    
@endsection