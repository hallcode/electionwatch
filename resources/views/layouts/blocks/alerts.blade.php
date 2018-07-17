@if (Auth::check() && !Auth::user()->isVerified)

    <section class="section alert">
        <aside class="alert">
            <header>
                Please verify your email address
            </header>
            <p>
                You should have recieved an email containing a link. Click on this link to verify. You will not recieve any further emails from us until you have verified your details.
            </p>
        </aside>
    </section>

@endif

@if ($alerts)
    @foreach($alerts as $alert)
        <section class="section alert">
            <aside class="alert {{ $alert->classname }}">
                <header>
                    {{ $alert->header }}
                </header>
                <p>
                    {{ $alert->text }}
                </p>
            </aside>
        </section>
    @endforeach
@endif