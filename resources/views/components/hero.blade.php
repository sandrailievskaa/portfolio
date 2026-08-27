@props(['portfolio'])

<section id="hero" class="relative overflow-hidden border-b border-ink-600/60">
    <div class="mx-auto max-w-6xl px-6 py-24 sm:py-32">
        <div class="hero-enter max-w-3xl">
            <p class="section-label mb-6">Portfolio</p>
            <h1 class="hero-name inline-block bg-accent-gradient bg-clip-text text-5xl font-black leading-[0.95] text-transparent sm:text-6xl lg:text-7xl">
                {{ $portfolio['meta']['name'] }}
            </h1>
            <p class="mt-4 max-w-xl font-mono text-sm uppercase tracking-[0.15em] text-accent-blue sm:text-base">
                {{ $portfolio['meta']['title'] }}
            </p>
            <p class="mt-6 max-w-xl text-lg text-paper-muted">
                {{ $portfolio['meta']['hook'] }}
            </p>
            <div class="mt-10 flex flex-wrap gap-4">
                <a href="#projects" class="btn-glow inline-flex items-center gap-2 rounded-full bg-accent-gradient px-6 py-3 text-sm font-medium text-ink-900">
                    View work
                    <iconify-icon icon="tabler:arrow-up-right" width="16" height="16" aria-hidden="true"></iconify-icon>
                </a>
                <a href="#contact" class="btn-glow inline-flex items-center gap-2 rounded-full border border-ink-500 px-6 py-3 text-sm font-medium text-paper hover:border-accent-blue">
                    <iconify-icon icon="tabler:mail" width="16" height="16" aria-hidden="true"></iconify-icon>
                    Contact
                </a>
                <a href="{{ asset($portfolio['contact']['resume']) }}" download class="btn-glow inline-flex items-center gap-2 rounded-full px-6 py-3 font-mono text-xs uppercase tracking-wide text-paper-muted hover:text-signal-amber">
                    <iconify-icon icon="tabler:download" width="14" height="14" aria-hidden="true"></iconify-icon>
                    Download résumé
                </a>
            </div>
        </div>
    </div>
</section>
