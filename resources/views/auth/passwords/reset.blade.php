@extends('layouts.app')

@section('content')
    <section class="section">
        <article>
            <h1>Chose a new password</h1>
            <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email"
                               class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                               value="{{ $email ?? old('email') }}" required autofocus>
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
                    <label for="password-confirm" class="label">{{ __('Confirm Password') }}</label>

                    <div class="control">
                        <input id="password-confirm" type="password" class="input" name="password_confirmation"
                               required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            {{ __('Reset Password') }}
                        </button>
                    </div>
                </div>
            </form>
        </article>

    </section>
@endsection
