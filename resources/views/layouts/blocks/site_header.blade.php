<section class="section" id="site-header">
    <header>
        <nav>
            <a href="/about">About</a>
            <a href="/notices">Notices</a>
            <a href="/levels">Threat Levels</a>
            <a href="/elections">Elections</a>
        </nav>
        <nav>
            @guest
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
            @else
                <span>
                            {{ Auth::user()->name }}
                        </span>
                @if (Auth::user()->isAdmin)
                    <a href="/admin">Admin</a>
                @endif
                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                    Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endguest
        </nav>
    </header>
</section>