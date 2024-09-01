@extends('auth/login_layout')
@section('title','login')
@section('content')

           <form method="POST" action="/login/store">
              @csrf
              <h1>Login Form</h1>
              <div>
                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Username" required autocomplete="username" autofocus>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div>
                <button type="submit" class="btn btn-default submit">Log in</button>
                @if (Route::has('password.request'))
                    <a class="reset_pass" href="{{ route('password.request') }}">Lost your password?</a>
                @endif
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="/register/create" class="to_register"> Create Account </a>
                </p>

               
@endsection