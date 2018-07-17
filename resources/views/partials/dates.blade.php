<section class="section">
    <article>
        <h2>Upcoming Elections</h2>
        <p>Most elections happen on a regular scheduled basis; the dates for these elections, where they known, are shown
            below.</p>
        @if ($polls->count() > 0)
            <div class="date-grid">
                @foreach($polls as $poll)
                    <a class="election-date" href="/elections/{{ $poll->election()->_title }}">
                        <p class="type {{ $poll->election()->_id }}">
                            {{ $poll->election()->name }}
                        </p>
                        @if ($poll->isSoon())
                            <p class="date">
                                {!! $poll->day !!}
                            </p>
                        @endif
                        <p class="year">
                            {{ $poll->year }}
                        </p>
                    </a>
                @endforeach
            </div>
        @else
            <p>
                <em>There are no upcoming elections.</em>
            </p>
        @endif
    </article>
</section>