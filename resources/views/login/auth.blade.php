<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{asset('assets/css/auth.css')}}">
</head>
<body>
<section class="forms-section">
  <h1 class="section-title"><span style="color:blue">Ohio</span><span style="color:pink">Shop</span></h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
      <form action="{{ url('login/proses') }}" class="form form-login" method="POST">
        @csrf
        <fieldset>
          <legend>Please, enter your email and password for login.</legend>
          <div class="input-block">
            <label for="login-email">Email</label>
            <input autofocus id="login-email" type="email" required class="form-control
            @error('email')
                is-invalid
            @enderror" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
            <input id="login-password" type="password" required class="
            @error('password')
                is-invalid
            @enderror
            " name="password">
            @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
          </div>
        </fieldset>
        <button type="submit" class="btn-login">Login</button>
      </form>
    </div>
    <div class="form-wrapper">
      <button type="button" class="switcher switcher-signup">
        Sign Up
        <span class="underline"></span>
      </button>
      <form class="form form-signup">
        <fieldset>
          <legend>Please, enter your email, password and password confirmation for sign up.</legend>
          <div class="input-block">
            <label for="signup-email">Email</label>
            <input id="signup-email" type="email" required>
          </div>
          <div class="input-block">
            <label for="signup-password">Password</label>
            <input id="signup-password" type="password" required>
          </div>
          <div class="input-block">
            <label for="signup-password-confirm">Confirm password</label>
            <input id="signup-password-confirm" type="password" required>
          </div>
        </fieldset>
        <button type="submit" class="btn-signup">Register</button>
      </form>
    </div>
  </div>
</section>


<script src="{{ asset('assets/js/auth.js') }}"></script>
</body>
</html>
