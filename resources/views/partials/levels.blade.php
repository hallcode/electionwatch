<section class="section">
    <main>
        @forelse($elections as $election)
            <h2>{{ $election->name }}</h2>
            @if($election->activeNotice() !== null)
                <div class="alert-container">
                    <div class="column">
                        <div class="alert {{ $election->activeNotice()->level()->classname }}">
                            {{ $election->activeNotice()->level()->title }}
                        </div>
                    </div>
                    <div class="description">
                        <p>A {{ strtolower($election->name) }} {{ $election->activeNotice()->level()->description }}</p>
                        <p>
                            {{ $election->activeNotice()->level()->action }}
                        </p>
                        <p class="meta">Last Updated: {{ $election->activeNotice()->updated_at }}</p>
                        <a class="more" href="/notices/{{ $election->activeNotice()->id }}">More Information</a>
                    </div>
                </div>
            @else
                <p>
                    No notices have been issued for this election type.
                </p>
            @endif
        @empty
            <p>No elections are currently being monitored.</p>
        @endforelse
    </main>
</section>