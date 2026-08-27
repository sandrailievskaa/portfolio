const TECH_ICONS = {
    Laravel: 'simple-icons:laravel',
    'Vue 3': 'simple-icons:vuedotjs',
    'Vue.js': 'simple-icons:vuedotjs',
    'Inertia.js': 'simple-icons:inertia',
    TypeScript: 'simple-icons:typescript',
    Filament: 'tabler:layout-dashboard',
    Django: 'simple-icons:django',
    Python: 'simple-icons:python',
    Bootstrap: 'simple-icons:bootstrap',
    'Chart.js': 'simple-icons:chartdotjs',
    Flutter: 'simple-icons:flutter',
    Dart: 'simple-icons:dart',
    'TensorFlow Lite': 'simple-icons:tensorflow',
    NetworkX: 'tabler:topology-star',
    'OpenAI API': 'simple-icons:openai',
    AI: 'tabler:brain',
    Mobile: 'tabler:device-mobile',
};

const FALLBACK_ICON = 'tabler:code';

export function techIcon(name) {
    return TECH_ICONS[name] ?? FALLBACK_ICON;
}
