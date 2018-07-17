@extends('layouts.admin')

@section('content')
    <h2>{{ $_title }}</h2>
    <p>
        This page allows you to update the dates of upcoming elections.
    </p>
    @if ($polls->count() > 0)
    <nav class="items">
        @foreach($polls as $poll)
            <article class="strip">
                <section>
                    <header>
                        {{ $poll->year }}
                    </header>
                    <span class="meta">
                        {!! $poll->day  !!}
                    </span>
                    <span>
                        {{ $poll->election()->name }}
                    </span>
                </section>
                <nav class="buttons">
                    <a href="/admin/polls/{{ $poll->id }}/delete" class="remove">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </nav>
            </article>
        @endforeach
    </nav>
    <nav class="pagination is-small" role="navigation" aria-label="pagination">
        @if($polls->currentPage() > 1)
            <a class="pagination-next" href="{{ $polls->previousPageUrl() }}">Previous</a>
            <div></div>
        @endif
        @if($polls->hasMorePages())
            <div></div>
            <a class="pagination-next" href="{{ $polls->nextPageUrl() }}">Next page</a>
        @endif
    </nav>
    @else
        <article class="no-items">
            <p>There are no Polls to show.</p>
            <p>
                Why not <a href="/admin/polls/create">create a poll</a> now?
            </p>
        </article>
    @endif

    <article class="list-meta">
        <p>
            {{ $polls->firstItem() }} - {{ $polls->lastItem() }} of {{ $polls->total() }}
        </p>
        <nav>
            <a href="/admin/polls/create" class="button is-link">Create</a>
        </nav>
    </article>
@endsection
