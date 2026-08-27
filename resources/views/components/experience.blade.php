@props(['portfolio'])

<section id="experience" class="reveal border-b border-ink-600/60 bg-ink-800/30">
    <div class="mx-auto max-w-6xl px-6 py-20 sm:py-28">
        <p class="section-label mb-4">
            <iconify-icon icon="tabler:briefcase" width="14" height="14" aria-hidden="true"></iconify-icon>
            Experience
        </p>
        <div class="flex flex-wrap items-baseline justify-between gap-4">
            <h2 class="text-2xl font-semibold text-paper sm:text-3xl">{{ $portfolio['experience']['company'] }}</h2>
            <p class="font-mono text-xs uppercase tracking-widest text-paper-dim">
                {{ $portfolio['experience']['location'] }} · {{ $portfolio['experience']['range'] }}
            </p>
        </div>

        <div class="mt-12 divide-y divide-ink-600">
            @foreach ($portfolio['experience']['roles'] as $role)
                <div class="reveal-child grid gap-4 py-8 sm:grid-cols-[200px_1fr]" style="transition-delay: {{ $loop->index * 60 }}ms">
                    <div>
                        <p class="font-mono text-xs uppercase tracking-widest text-accent-blue">{{ $role['range'] }}</p>
                        <p class="mt-1 font-medium text-paper">{{ $role['title'] }}</p>
                    </div>
                    <ul class="space-y-2">
                        @foreach ($role['points'] as $point)
                            <li class="flex gap-3 text-paper-muted">
                                <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-accent-indigo" aria-hidden="true"></span>
                                <span>{{ $point }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endforeach
        </div>
    </div>
</section>
