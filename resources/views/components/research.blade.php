@props(['portfolio'])

<section id="research" class="reveal border-b border-ink-600/60">
    <div class="mx-auto max-w-6xl px-6 py-20 sm:py-28">
        <p class="section-label mb-4">
            <iconify-icon icon="tabler:flask" width="14" height="14" aria-hidden="true"></iconify-icon>
            Research &amp; Publications
        </p>
        <h2 class="text-2xl font-semibold text-paper sm:text-3xl">Five papers, two live threads.</h2>

        <div id="research-grid" data-props='@json(['papers' => $portfolio['research']])'></div>
    </div>
</section>
