@props(['portfolio'])

<footer class="border-t border-ink-600/60">
    <div class="mx-auto flex max-w-6xl flex-col items-center justify-between gap-4 px-6 py-8 text-xs text-paper-dim sm:flex-row">
        <p class="font-mono">© {{ date('Y') }} {{ $portfolio['meta']['name'] }}</p>
        <p class="font-mono">Built with Laravel, Tailwind &amp; Vue</p>
    </div>
</footer>
