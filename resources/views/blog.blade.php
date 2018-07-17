@extends('layouts.app')

@section('content')
    <section class="section">
        <header>
            <h1>Recent Updates</h1>
        </header>
    </section>
    <section class="section">
        <article>
            <div class="blog-container">
                @forelse($notices as $notice)
                    <a href="/notices/{{$notice->id}}">
                        <h2>{{ $notice->title }}</h2>
                        <p class="meta">
                            {{ $notice->created_at->format('jS M Y') }}: the threat of a {{ $notice->election()->name }} was {{ $notice->change }} to {{ $notice->level()->title }}.
                        </p>
                        <p>
                            {{ str_limit($notice->post, 175) }}
                        </p>
                    </a>
                @empty
                    <p>
                        <em>There are no recent updates to show.</em>
                    </p>
                @endforelse
            </div>
        </article>
    </section>
@endsection
