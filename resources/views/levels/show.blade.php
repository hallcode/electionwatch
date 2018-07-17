@extends('layouts.app')

@section('content')
    <section class="section">
        <main>
            <h1>{{ $level->title }}</h1>
            <article>
                <div class="split-container">
                    <aside>
                        <h4>Description</h4>
                    </aside>
                    <p>
                        An election {{ $level->description }}
                    </p>
                    <aside>
                        <h4>Action</h4>
                    </aside>
                    <p>
                        An election {{ $level->action }}
                    </p>
                </div>

                @markdown($level->_markdown)
            </article>

        </main>
    </section>
@endsection
