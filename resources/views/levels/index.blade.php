@extends('layouts.app')

@section('content')
    <section class="section">
        <main>
            <h1>Election Threat Levels</h1>
            <div class="split-container">
                <aside>
                    <p>
                        On the right is a list of the different threat levels that can be used.
                    </p>
                    <p>
                        Click for more details.
                    </p>
                </aside>

                <ul>
                    @forelse($levels as $level)
                        <li>
                            <a href="/levels/{{ $level->_title }}">
                                {{ $level->title }}
                            </a>
                        </li>
                    @empty
                        <li>
                            <em>There are no levels to show.</em>
                        </li>
                    @endforelse
                </ul>
            </div>
        </main>
    </section>
@endsection
