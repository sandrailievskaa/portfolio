@props(['portfolio'])

@php
    $projectFilterProps = ['projects' => $portfolio['projects'], 'filters' => $portfolio['project_filters']];
@endphp

<section id="projects" class="reveal border-b border-ink-600/60 bg-ink-800/30">
    <div class="mx-auto max-w-6xl px-6 py-20 sm:py-28">
        <p class="section-label mb-4">
            <iconify-icon icon="tabler:code" width="14" height="14" aria-hidden="true"></iconify-icon>
            Projects
        </p>
        <h2 class="text-2xl font-semibold text-paper sm:text-3xl">Selected work</h2>

        <div
            id="project-filter"
            class="mt-12"
            data-props='@json($projectFilterProps)'
        ></div>
    </div>
</section>
