<script setup>
import { ref, onMounted, onBeforeUnmount } from 'vue';

const props = defineProps({
    sections: { type: Array, required: true },
});

const SECTION_ICONS = {
    about: 'tabler:user',
    experience: 'tabler:briefcase',
    research: 'tabler:flask',
    projects: 'tabler:code',
    skills: 'tabler:tools',
    education: 'tabler:school',
    beyond: 'tabler:compass',
    contact: 'tabler:mail',
};

const active = ref(props.sections[0]?.id ?? '');
const mobileOpen = ref(false);
let observer;

function iconFor(id) {
    return SECTION_ICONS[id] ?? 'tabler:point';
}

function scrollTo(id) {
    const el = document.getElementById(id);
    if (el) {
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
    mobileOpen.value = false;
}

onMounted(() => {
    const targets = props.sections
        .map((s) => document.getElementById(s.id))
        .filter(Boolean);

    if ('IntersectionObserver' in window && targets.length) {
        observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        active.value = entry.target.id;
                    }
                });
            },
            { rootMargin: '-40% 0px -55% 0px', threshold: 0 }
        );
        targets.forEach((el) => observer.observe(el));
    }
});

onBeforeUnmount(() => {
    observer?.disconnect();
});
</script>

<template>
    <nav aria-label="Primary">
        <ul class="hidden items-center gap-6 md:flex">
            <li v-for="section in sections" :key="section.id">
                <a
                    :href="`#${section.id}`"
                    class="nav-underline group flex items-center gap-1.5 font-mono text-xs tracking-wide transition-colors"
                    :class="active === section.id ? 'is-active text-paper' : 'text-paper-muted hover:text-paper'"
                    :aria-current="active === section.id ? 'true' : undefined"
                    @click.prevent="scrollTo(section.id)"
                >
                    <iconify-icon
                        :icon="iconFor(section.id)"
                        width="13"
                        height="13"
                        class="transition-colors"
                        :class="active === section.id ? 'text-accent-blue' : 'text-paper-dim group-hover:text-accent-blue'"
                    ></iconify-icon>
                    <span>{{ section.label }}</span>
                </a>
            </li>
        </ul>

        <button
            type="button"
            class="btn-glow flex h-9 w-9 items-center justify-center rounded-full border border-ink-500 text-paper md:hidden"
            :aria-expanded="mobileOpen"
            aria-label="Toggle navigation menu"
            aria-controls="mobile-nav-panel"
            @click="mobileOpen = !mobileOpen"
        >
            <iconify-icon :icon="mobileOpen ? 'tabler:x' : 'tabler:menu-2'" width="16" height="16" aria-hidden="true"></iconify-icon>
        </button>

        <div
            v-if="mobileOpen"
            id="mobile-nav-panel"
            class="fixed inset-x-0 top-16 z-40 border-b border-ink-500 bg-ink-900/98 px-6 py-6 md:hidden"
        >
            <ul class="flex flex-col gap-4">
                <li v-for="section in sections" :key="section.id">
                    <a
                        :href="`#${section.id}`"
                        class="flex items-center gap-3 font-mono text-sm"
                        :class="active === section.id ? 'text-paper' : 'text-paper-muted'"
                        @click.prevent="scrollTo(section.id)"
                    >
                        <iconify-icon
                            :icon="iconFor(section.id)"
                            width="16"
                            height="16"
                            :class="active === section.id ? 'text-accent-blue' : 'text-paper-dim'"
                        ></iconify-icon>
                        <span>{{ section.label }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</template>
