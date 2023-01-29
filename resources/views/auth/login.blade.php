<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ScretsApp - Login</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div class="login-register-container">
    <section class="login-register-section-form">
        <div class="login-register-btns-change-menu">
            <a style="border-bottom: 1px solid #7B2CBF" href="{{ url("/login") }}">Login</a>
            <a href="{{ url("/register") }}">Register</a>
        </div>
        <div class="login-register-form-sections">
            <div>
                <h1>Login</h1>
            </div>
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <input id="email" type="text" class="@error('email') is-invalid @enderror" name="email"
                       value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">
                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password"
                       value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                <button>Send</button>
            </form>
        </div>
    </section>
    <section class="login-register-section-background login-section-background">

    </section>
</div>
</body>
</html>


