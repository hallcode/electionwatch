@extends('layouts.app')

@section('content')
    <section class="section">
        <article class="intro box">
            <p>
                Election Watch exists to advise UK residents about the ongoing levels of threat faced by snap elections and referenda.
            </p>
        </article>
    </section>
    @include('layouts.blocks.alerts')

    @include('partials.levels')

    @include('partials.dates')

    @include('partials.blog')

    <section class="section">
        <article>
            If you like this site, or just want to get more involved and take part in the discussion, check out our subreddit <a target="_blank" href="https://www.reddit.com/r/ElectionWatchUK">r/ElectionWatchUK</a>
        </article>
    </section>
@endsection
