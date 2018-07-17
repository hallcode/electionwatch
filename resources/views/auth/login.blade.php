@extends('layouts.app')

@section('content')
    <section class="section">
        <article>
            <h1>Log In</h1>
            <form method="POST" class="narrow" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                @csrf

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                    <div class="control">
                        <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}"
                               name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <p class="help is-danger" role="alert">
                           {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <label for="password" class="label">{{ __('Password') }}</label>

                    <div class="control">
                        <input id="password" type="password"
                               class="input {{ $errors->has('password') ? ' is-danger' : '' }}" name="password"
                               required>
                    </div>
                    @if ($errors->has('password'))
                        <p class="help is-danger" role="alert">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox" for="remember">
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            {{ __('Login') }}
                        </button>

                        <a class="button" href="{{ route('password.request') }}">
                            {{ __('Forgot Your Password?') }}
                        </a>
                    </div>
                </div>
            </form>
        </article>

    </section>
@endsection
