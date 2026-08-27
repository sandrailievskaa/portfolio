@props(['portfolio'])

<section id="contact" class="reveal">
    <div class="mx-auto max-w-6xl px-6 py-24 sm:py-32">
        <p class="section-label mb-4">
            <iconify-icon icon="tabler:send" width="14" height="14" aria-hidden="true"></iconify-icon>
            Contact
        </p>
        <h2 class="max-w-2xl text-3xl font-semibold text-paper sm:text-4xl">
            Open to backend-leaning full-stack roles and research collaborations.
        </h2>

        <div class="mt-12 flex flex-wrap gap-4">
            <a href="mailto:{{ $portfolio['contact']['email'] }}" class="btn-glow inline-flex items-center gap-2 rounded-full bg-accent-gradient px-6 py-3 text-sm font-medium text-ink-900">
                <iconify-icon icon="tabler:mail" width="16" height="16" aria-hidden="true"></iconify-icon>
                {{ $portfolio['contact']['email'] }}
            </a>
            <a href="{{ $portfolio['contact']['linkedin_url'] }}" target="_blank" rel="noopener" class="btn-glow inline-flex items-center gap-2 rounded-full border border-ink-500 px-6 py-3 text-sm font-medium text-paper hover:border-accent-blue">
                <iconify-icon icon="tabler:brand-linkedin" width="16" height="16" aria-hidden="true"></iconify-icon>
                LinkedIn
            </a>
            <a href="{{ $portfolio['contact']['github_url'] }}" target="_blank" rel="noopener" class="btn-glow inline-flex items-center gap-2 rounded-full border border-ink-500 px-6 py-3 text-sm font-medium text-paper hover:border-accent-blue">
                <iconify-icon icon="tabler:brand-github" width="16" height="16" aria-hidden="true"></iconify-icon>
                GitHub
            </a>
            <a href="{{ $portfolio['contact']['resume'] }}" download class="btn-glow inline-flex items-center gap-2 rounded-full px-6 py-3 font-mono text-xs uppercase tracking-wide text-paper-muted hover:text-signal-amber">
                <iconify-icon icon="tabler:download" width="14" height="14" aria-hidden="true"></iconify-icon>
                Download résumé
            </a>
        </div>
    </div>
</section>
