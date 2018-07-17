<section class="section grey">
    <article>
        <h1>Recent updates</h1>
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