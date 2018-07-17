@extends('layouts.app')

@section('content')
    <section class="section">
        <header>
            <h1>{{ $election->name }}</h1>
        </header>
    </section>
    <section class="section">
        <main class="split-container">
            <dl class="left card">
                <dt>Name</dt>
                <dd>{{ $election->name }}</dd>

                <dt>Monitored</dt>
                <dd>{{ ( $election->isWatched ? 'Yes' : 'No') }}</dd>

                @if(isset($election->details))
                    @foreach($election->details as $key => $value)
                        <dt>{{ $key }}</dt>
                        @if(is_array($value))
                            <dd>
                                <ul>
                                    @foreach($value as $v)
                                        <li>{{ $v}}</li>
                                    @endforeach
                                </ul>
                            </dd>
                        @else
                        <dd>{{ $value }}</dd>
                        @endif
                    @endforeach
                @endif
            </dl>
            <article>
                @if($election->description)
                    <p>
                        {{ $election->description }}
                    </p>
                @endif

                @markdown($election->_markdown)
            </article>
            <aside>
                <h3>Upcoming {{ strtolower(str_plural($election->name)) }}</h3>
                <ol>
                    @forelse($polls_soon as $poll)
                        <li>
                            {{ $poll->date->format('jS F Y') }}
                        </li>
                    @empty
                        <p>
                            There are no upcoming polls to show.
                        </p>
                    @endforelse
                </ol>
            </aside>
            <aside>
                <h3>Previous {{ strtolower(str_plural($election->name)) }}</h3>
                <ol>
                    @forelse($polls_old as $poll)
                        <li>
                            {{ $poll->date->format('jS F Y') }}
                        </li>
                    @empty
                        <p>
                            There are no historical polls to show.
                        </p>
                    @endforelse
                </ol>
            </aside>
        </main>
    </section>
@endsection
