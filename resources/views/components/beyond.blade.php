@props(['portfolio'])

@php
    $beyondIcon = fn (string $title): string => match (true) {
        str_contains($title, 'EEML') => 'tabler:rocket',
        str_contains($title, 'Plant Disease') => 'tabler:users-group',
        str_contains($title, 'Cybersecurity') => 'tabler:shield-lock',
        str_contains($title, 'Shared Horizons') => 'tabler:users',
        str_contains($title, 'Hackathons') => 'tabler:trophy',
        default => 'tabler:sparkles',
    };
@endphp

<section id="beyond" class="reveal border-b border-ink-600/60">
    <div class="mx-auto max-w-6xl px-6 py-20 sm:py-28">
        <p class="section-label mb-4">
            <iconify-icon icon="tabler:compass" width="14" height="14" aria-hidden="true"></iconify-icon>
            Beyond the Code
        </p>
        <h2 class="text-2xl font-semibold text-paper sm:text-3xl">Outside the IDE</h2>

        <div class="mt-12 grid gap-6 sm:grid-cols-2">
            @foreach ($portfolio['beyond'] as $item)
                <div class="card-hover reveal-child rounded-2xl border border-ink-500 p-6" style="transition-delay: {{ $loop->index * 60 }}ms">
                    <iconify-icon icon="{{ $beyondIcon($item['title']) }}" width="20" height="20" class="text-accent-blue" aria-hidden="true"></iconify-icon>
                    <p class="mt-3 font-medium text-paper">{{ $item['title'] }}</p>
                    <p class="mt-1 font-mono text-xs uppercase tracking-widest text-paper-dim">{{ $item['meta'] }}</p>
                    <p class="mt-3 text-sm leading-relaxed text-paper-muted">{{ $item['description'] }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>
