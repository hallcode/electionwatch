@extends('layouts.app')

@section('content')
    <section class="section">
        <main>
            <h1>Elections in the UK</h1>
            <div class="split-container">
                <aside>
                    <p>
                        Below is a list of all the different types of election that take place
                        in the UK.
                    </p>
                    <p>
                        Click for more details.
                    </p>
                </aside>

                <ul>
                    @forelse($elections as $election)
                        <li>
                            <a href="/elections/{{ $election->_title }}">
                                {{ $election->name }}
                            </a>
                        </li>
                    @empty
                        <li>
                            <em>There are no elections to show.</em>
                        </li>
                    @endforelse
                </ul>

        </main>
    </section>
@endsection
