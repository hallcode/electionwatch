@extends('layouts.app')

@section('content')
    <section class="section">
        <header>
            <h1>Notice: {{ $notice->created_at->format('j F Y') }} / {{ $notice->election()->name }}</h1>
        </header>
    </section>
    <section class="section alert" style="margin-top: 0; margin-bottom: 1rem">
        <aside class="alert {{ $notice->change_class }}">
            <header>
                {{ ucfirst($notice->change) }}
            </header>
            <p>
                On the {{ $notice->created_at->format('jS \\of M Y') }} the threat of a {{ strtolower($notice->election()->name) }} was {{ $notice->change }} to <strong>{{ strtolower($notice->level()->title) }}</strong>.
            </p>
        </aside>
    </section>
    <section class="section">
        <article class="split-container">
            <dl class="left card">
                <dt>Date of Issue</dt>
                <dd>{{ $notice->created_at->format('j F Y') }}</dd>

                <dt>Status</dt>
                <dd>
                    @if($notice->is_active)
                        In force
                    @else
                        Superseded by:
                        <a href="/notices/{{$notice->election()->activeNotice()->id}}">
                            {{ $notice->election()->activeNotice()->created_at->format('j F Y') }}
                        </a>
                    @endif
                </dd>

                <dt>Election</dt>
                <dd>{{ $notice->election()->name }}</dd>

                <dt>Level</dt>
                <dd>{{ $notice->level()->title }}</dd>

                <dt>Action</dt>
                <dd>{{ $notice->level()->action }}</dd>
            </dl>
            <main>
                <h1>{{ $notice->title }}</h1>
                @markdown($notice->post)
            </main>
        </article>
    </section>
@endsection
