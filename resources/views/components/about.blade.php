@props(['portfolio'])

<section id="about" class="reveal mx-auto max-w-6xl border-b border-ink-600/60 px-6 py-20 sm:py-28">
    <div class="grid gap-12 lg:grid-cols-[0.9fr_1.1fr]">
        <div>
            <p class="section-label mb-4">
                <iconify-icon icon="tabler:user" width="14" height="14" aria-hidden="true"></iconify-icon>
                About
            </p>
            <h2 class="text-2xl font-semibold text-paper sm:text-3xl">Engineer first, researcher on the side.</h2>
        </div>
        <div>
            <p class="text-lg leading-relaxed text-paper-muted">{{ $portfolio['about']['bio'] }}</p>

            <div id="about-stats" data-props='@json(['stats' => $portfolio['about']['stats']])'></div>
        </div>
    </div>
</section>
