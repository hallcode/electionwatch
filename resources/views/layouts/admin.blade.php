<!DOCTYPE html>
@include('layouts.blocks.html_head')
<body>
<div id="wrapper">

    @include('layouts.blocks.site_header')

    @include('layouts.blocks.masthead')

    <section class="section">
        <header>
            <h1>
                Admin
            </h1>
        </header>
    </section>
    <section class="section">
        <article class="split-container">
            <aside class="menu left">
                <p class="menu-label">
                    Content
                </p>
                <nav class="menu-list">
                    <a href="/admin">Dashboard</a>
                    <a href="/admin/notices">Notices</a>
                    <a href="/admin/polls">Polls</a>
                </nav>
            </aside>
            <main>
                @yield('content')
            </main>
        </article>
    </section>

    @include('layouts.blocks.footer')

</div>
</body>
</html>
