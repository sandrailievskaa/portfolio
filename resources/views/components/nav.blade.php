@props(['portfolio'])

<header class="sticky top-0 z-50 border-b border-ink-600/60 bg-ink-900/85 backdrop-blur supports-[backdrop-filter]:bg-ink-900/70">
    <div class="mx-auto flex h-16 max-w-6xl items-center justify-between px-6">
        <a href="#hero" class="shrink-0" aria-label="{{ $portfolio['meta']['name'] }} — back to top">
            <svg width="34" height="34" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="{{ $portfolio['meta']['name'] }} logomark">
                <defs>
                    <linearGradient id="logomark-grad" x1="0" y1="0" x2="36" y2="36" gradientUnits="userSpaceOnUse">
                        <stop offset="0" stop-color="#6366f1" />
                        <stop offset="1" stop-color="#3b82f6" />
                    </linearGradient>
                </defs>
                <circle cx="18" cy="18" r="17" fill="url(#logomark-grad)" />
                <path d="M14.6 12.6c.3-3 2.1-4.8 4.4-4.4 2 .3 3.1 1.9 3 3.9" stroke="#e4e4e7" stroke-width="1.4" stroke-linecap="round" fill="none" />
                <circle cx="18" cy="13.6" r="3" fill="none" stroke="#e4e4e7" stroke-width="1.4" />
                <rect x="13" y="19.4" width="10" height="6" rx="1" fill="none" stroke="#e4e4e7" stroke-width="1.4" />
                <rect x="11.3" y="25.6" width="13.4" height="1.8" rx="0.9" fill="#e4e4e7" />
            </svg>
        </a>

        <div id="nav-spy" data-props='@json(['sections' => $portfolio['nav']])'></div>

        <a
            href="{{ $portfolio['contact']['resume'] }}"
            download
            class="btn-glow hidden items-center gap-2 rounded-full border border-ink-500 px-4 py-2 font-mono text-xs uppercase tracking-wide text-paper-muted hover:border-accent-blue hover:text-paper sm:inline-flex"
        >
            <iconify-icon icon="tabler:download" width="14" height="14" aria-hidden="true"></iconify-icon>
            Resume
        </a>
    </div>
</header>
