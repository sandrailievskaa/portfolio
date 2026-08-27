@props(['portfolio'])

@php
    $skillIcon = function (string $item): string {
        return match ($item) {
            '.NET / ASP.NET / ABP' => 'simple-icons:dotnet',
            'Laravel / PHP' => 'simple-icons:laravel',
            'Django' => 'simple-icons:django',
            'TypeScript' => 'simple-icons:typescript',
            'Vue.js' => 'simple-icons:vuedotjs',
            'React' => 'simple-icons:react',
            'Flutter' => 'simple-icons:flutter',
            'Razor' => 'tabler:code',
            'PostgreSQL' => 'simple-icons:postgresql',
            'MySQL' => 'simple-icons:mysql',
            'SQL Server' => 'simple-icons:microsoftsqlserver',
            'SQLite' => 'simple-icons:sqlite',
            'OpenAI API' => 'simple-icons:openai',
            'TensorFlow Lite' => 'simple-icons:tensorflow',
            'LangGraph' => 'tabler:route',
            'DINOv2' => 'tabler:eye',
            'pgvector' => 'tabler:vector-triangle',
            'Git' => 'simple-icons:git',
            'GitHub Actions' => 'simple-icons:githubactions',
            'Azure DevOps' => 'simple-icons:azuredevops',
            'Jira' => 'simple-icons:jira',
            default => 'tabler:point',
        };
    };

    $chartCategories = array_map(
        fn (array $group) => ['label' => $group['group'], 'count' => count($group['items'])],
        $portfolio['skills']
    );
@endphp

<section id="skills" class="reveal border-b border-ink-600/60">
    <div class="mx-auto max-w-6xl px-6 py-20 sm:py-28">
        <p class="section-label mb-4">
            <iconify-icon icon="tabler:tools" width="14" height="14" aria-hidden="true"></iconify-icon>
            Skills
        </p>
        <h2 class="text-2xl font-semibold text-paper sm:text-3xl">Tech Stack</h2>

        <div class="mt-12 grid gap-12 lg:grid-cols-[1.4fr_1fr] lg:items-start">
            <div class="grid gap-8 sm:grid-cols-2">
                @foreach ($portfolio['skills'] as $group)
                    <div class="reveal-child" style="transition-delay: {{ $loop->index * 60 }}ms">
                        <p class="font-mono text-xs uppercase tracking-widest text-accent-blue">{{ $group['group'] }}</p>
                        <div class="mt-4 flex flex-wrap gap-2">
                            @foreach ($group['items'] as $item)
                                <span class="inline-flex items-center gap-1.5 rounded-full border border-ink-500 px-3 py-1.5 font-mono text-xs text-paper-muted transition-colors hover:border-accent-indigo hover:text-paper">
                                    <iconify-icon icon="{{ $skillIcon($item) }}" width="13" height="13" aria-hidden="true"></iconify-icon>
                                    {{ $item }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="reveal-child rounded-2xl border border-ink-500 bg-ink-800/40 p-6" style="transition-delay: 300ms">
                <p class="font-mono text-xs uppercase tracking-widest text-paper-dim">Stack distribution</p>
                <div id="skills-chart" class="mt-6" data-props='@json(['categories' => $chartCategories])'></div>
            </div>
        </div>
    </div>
</section>
