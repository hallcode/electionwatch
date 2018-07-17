@extends('layouts.app')

@section('content')
    @if (session('status'))
    <section>
        <aside class="alert">
            <p>
                {{ session('status') }}
            </p>
        </aside>
    </section>
    @endif
<section class="section">
    <article>
        <h1>Reset Password</h1>
        <p>
            If you have forgotten your password, enter your email address below and we will
            send an email to that address containing instructions on how to chose a new password.
        </p>
        <form method="POST" class="narrow" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
            @csrf

            <div class="field">
                <label for="email" class="label">{{ __('E-Mail Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-danger' : '' }}" name="email" value="{{ old('email') }}" required>
                </div>

                @if ($errors->has('email'))
                    <p class="help is-danger" role="alert">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <div class="field">
                <div class="control">
                    <button type="submit" class="button is-link">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </article>

</section>
@endsection
