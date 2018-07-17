@extends('layouts.admin')

@section('content')
    <h2>Notices</h2>
    @if ($notices->count() > 0)
        <p>
            Any notice marked with <span><i class="fas fa-certificate"></i></span> is currently in force.
        </p>

        <nav class="items">
            @foreach($notices as $notice)
                <article class="strip">
                    <section>
                        <header>
                            {{ $notice->created_at->format('j M Y') }}
                        </header>
                        <span class="alert {{ $notice->level()->classname }}">
                            {{ $notice->level()->title }}
                        </span>
                        <span>
                            {{ $notice->election()->name }}
                        </span>
                        @if($notice->isActive)
                            <span>
                                <i class="fas fa-certificate"></i>
                            </span>
                        @endif
                    </section>
                    <nav class="buttons">
                        <a href="/admin/notices/{{ $notice->id }}/edit" class="edit">
                            <i class="fas fa-pen"></i>
                        </a>
                        <a href="/admin/notices/{{ $notice->id }}/delete" class="remove">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </nav>
                </article>
            @endforeach
        </nav>
        <nav class="pagination is-small" role="navigation" aria-label="pagination">
            @if($notices->currentPage() > 1)
                <a class="pagination-next" href="{{ $notices->previousPageUrl() }}">Previous</a>
                <div></div>
            @endif
            @if($notices->hasMorePages())
                <div></div>
                <a class="pagination-next" href="{{ $notices->nextPageUrl() }}">Next page</a>
            @endif
        </nav>
    @else
        <article class="no-items">
            <p>There are no notices to show.</p>
            <p>
                Why not <a href="/admin/notices/create">create a notice</a> now?
            </p>
        </article>
    @endif

    <article class="list-meta">
        <p>
            {{ $notices->firstItem() }} - {{ $notices->lastItem() }} of {{ $notices->total() }}
        </p>
        <nav>
            <a href="/admin/notices/create" class="button is-link">Create</a>
        </nav>
    </article>

@endsection