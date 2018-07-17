<!DOCTYPE html>
@include('layouts.blocks.html_head')
<body>
    <div id="wrapper">

        @include('layouts.blocks.site_header')

        @include('layouts.blocks.masthead')

        @yield('content')

        @include('layouts.blocks.footer')

    </div>
</body>
</html>
