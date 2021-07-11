@extends('auth.passwords.password')
@section('content')
    <h1 class="login-header text-center">تسجيل الدخول</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">                            

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">                            
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="{{ __('Password') }}">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class="form-group">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                    <label class="form-check-label" for="remember">
                        تذكرني
                    </label>
                </div>
        </div>

        <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block">
                    دخول
                </button>

                @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        إستعادة كلمة السر
                    </a>
                @endif
        </div>
    </form>
@endsection       

