<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $portfolio['meta']['name'] }} — {{ $portfolio['meta']['title'] }}</title>
    <meta name="description" content="{{ $portfolio['meta']['hook'] }}">
    <meta property="og:title" content="{{ $portfolio['meta']['name'] }} — {{ $portfolio['meta']['title'] }}">
    <meta property="og:description" content="{{ $portfolio['meta']['hook'] }}">
    <meta property="og:type" content="website">
    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
    <link rel="icon" href="{{ asset('favicon-32x32.png') }}" type="image/png" sizes="32x32">
    <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}" sizes="180x180">
    <script defer src="https://code.iconify.design/iconify-icon/2.1.0/iconify-icon.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-ink-900 font-sans text-paper antialiased">
    <a href="#main" class="sr-only focus:not-sr-only focus:absolute focus:left-4 focus:top-4 focus:z-50 focus:rounded focus:bg-ink-800 focus:px-4 focus:py-2 focus:text-paper">
        Skip to content
    </a>

    <x-nav :portfolio="$portfolio" />

    <main id="main">
        <x-hero :portfolio="$portfolio" />
        <x-about :portfolio="$portfolio" />
        <x-experience :portfolio="$portfolio" />
        <x-research :portfolio="$portfolio" />
        <x-projects :portfolio="$portfolio" />
        <x-skills :portfolio="$portfolio" />
        <x-education :portfolio="$portfolio" />
        <x-beyond :portfolio="$portfolio" />
        <x-contact :portfolio="$portfolio" />
    </main>

    <x-footer :portfolio="$portfolio" />

    <div id="reveal-observer"></div>
</body>
</html>
