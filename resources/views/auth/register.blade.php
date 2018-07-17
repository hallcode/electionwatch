@extends('layouts.app')

@section('content')
    <section class="section">
        <article>
            <h1>Sign Up</h1>
            <p>
                By signing up below, you can be notified of any changes in the threat level. At some point in the future
                we hope to introduce a voting system where members can vote to raise or lower the level.
            </p>
            <form class="narrow" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf

                <div class="field">
                    <label for="name" class="label">{{ __('Name') }}</label>
                    <div class="control">
                        <input id="name" type="text" class="input {{ $errors->has('name') ? ' is-danger' : '' }}" name="name"
                               value="{{ old('name') }}" required autofocus>
                    </div>
                    @if ($errors->has('name'))
                        <p class="help is-danger" role="alert">
                            {{ $errors->first('name') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <label for="email" class="label">{{ __('E-Mail Address') }}</label>
                    <div class="control">
                        <input id="email" type="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}"
                               name="email" value="{{ old('email') }}" required>
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
                        <input id="password" type="password" class="input {{ $errors->has('password') ? ' is-danger' : '' }}"
                               name="password" required>
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
                        <input id="password-confirm" type="password" class="input" name="password_confirmation" required>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="gdpr_consent" required>
                            I have read the full <a href="/privacy">privacy policy</a> and agree to be bound by its terms, which include my consent for me to be contacted regarding my account.
                        </label>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <label class="checkbox">
                            <input type="checkbox" name="mailing_list">
                            I would like to receive an email whenever the threat level changes.
                        </label>
                    </div>
                </div>

                <div class="field">
                    <div class="control">
                        <button type="submit" class="button is-link">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>

            </form>
        </article>
    </section>
@endsection
