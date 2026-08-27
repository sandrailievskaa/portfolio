@props(['portfolio'])

<section id="education" class="reveal border-b border-ink-600/60 bg-ink-800/30">
    <div class="mx-auto max-w-6xl px-6 py-20 sm:py-28">
        <p class="section-label mb-4">
            <iconify-icon icon="tabler:school" width="14" height="14" aria-hidden="true"></iconify-icon>
            Education
        </p>
        <ul class="max-w-3xl space-y-5">
            @foreach ($portfolio['education'] as $edu)
                <li class="flex flex-wrap items-baseline justify-between gap-2 border-b border-ink-600 pb-4">
                    <div class="flex items-start gap-3">
                        <iconify-icon icon="tabler:school" width="16" height="16" class="mt-1 shrink-0 text-paper-dim" aria-hidden="true"></iconify-icon>
                        <div>
                            <p class="font-medium text-paper">{{ $edu['institution'] }}</p>
                            <p class="text-sm text-paper-muted">{{ $edu['program'] }}</p>
                        </div>
                    </div>
                    @if ($edu['range'])
                        <p class="font-mono text-xs uppercase tracking-widest text-paper-dim">{{ $edu['range'] }}</p>
                    @endif
                </li>
            @endforeach
        </ul>

        <div class="mt-16">
            <p class="section-label mb-4">
                <iconify-icon icon="tabler:certificate" width="14" height="14" aria-hidden="true"></iconify-icon>
                Certifications
            </p>
            <div id="certifications-grid" class="mt-6" data-props='@json(['certifications' => $portfolio['certifications']])'></div>
        </div>
    </div>
</section>
