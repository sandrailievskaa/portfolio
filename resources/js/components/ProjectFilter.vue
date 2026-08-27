<script setup>
import { ref, reactive, computed } from 'vue';
import { techIcon } from '../techIcons';
import Modal from './Modal.vue';

const props = defineProps({
    projects: { type: Array, required: true },
    filters: { type: Array, required: true },
});

const activeFilter = ref('All');
const modalRefs = reactive({});

function filterIcon(filter) {
    return filter === 'All' ? 'tabler:apps' : techIcon(filter);
}

function projectKey(project) {
    return project.repo || project.name;
}

function openModal(project, event) {
    modalRefs[projectKey(project)]?.open(event.currentTarget);
}

const filteredProjects = computed(() => {
    if (activeFilter.value === 'All') return props.projects;
    return props.projects.filter((project) => project.tags.includes(activeFilter.value));
});
</script>

<template>
    <div>
        <div class="flex flex-wrap gap-2" role="group" aria-label="Filter projects by technology">
            <button
                v-for="filter in filters"
                :key="filter"
                type="button"
                class="btn-glow inline-flex items-center gap-1.5 rounded-full border px-4 py-1.5 font-mono text-xs uppercase tracking-wide"
                :class="activeFilter === filter
                    ? 'border-transparent bg-accent-gradient text-ink-900'
                    : 'border-ink-500 text-paper-muted hover:border-accent-indigo hover:text-paper'"
                :aria-pressed="activeFilter === filter"
                @click="activeFilter = filter"
            >
                <iconify-icon :icon="filterIcon(filter)" width="13" height="13" aria-hidden="true"></iconify-icon>
                {{ filter }}
            </button>
        </div>

        <div class="mt-8 grid gap-6 sm:grid-cols-2">
            <article
                v-for="project in filteredProjects"
                :key="projectKey(project)"
                class="project-card rounded-2xl border border-ink-500 bg-ink-800/40 p-6"
            >
                <div class="flex flex-wrap gap-2">
                    <span
                        v-for="tag in project.tags"
                        :key="tag"
                        class="inline-flex items-center gap-1 rounded-full border border-ink-500 px-2.5 py-0.5 font-mono text-[10px] uppercase tracking-widest text-accent-blue"
                    >
                        <iconify-icon :icon="techIcon(tag)" width="11" height="11" aria-hidden="true"></iconify-icon>
                        {{ tag }}
                    </span>
                </div>

                <h3 class="mt-4 text-lg font-medium text-paper">{{ project.name }}</h3>

                <p class="mt-2 text-sm leading-relaxed text-paper-muted">{{ project.description }}</p>

                <div class="project-card-overlay">
                    <ul class="flex flex-wrap gap-1.5">
                        <li
                            v-for="tech in project.stack"
                            :key="tech"
                            class="inline-flex items-center gap-1 rounded-full bg-ink-700 px-2.5 py-1 font-mono text-[10px] text-paper-dim"
                        >
                            <iconify-icon :icon="techIcon(tech)" width="11" height="11" aria-hidden="true"></iconify-icon>
                            {{ tech }}
                        </li>
                    </ul>
                    <div class="flex flex-wrap items-center justify-between gap-x-3 gap-y-2">
                        <button
                            type="button"
                            class="inline-flex shrink-0 items-center gap-1 rounded-full border border-ink-500 px-3 py-1.5 font-mono text-xs font-medium text-paper transition-colors duration-200 ease-out hover:border-accent-blue"
                            @click="openModal(project, $event)"
                        >
                            Details
                        </button>
                        <a
                            v-if="project.repo"
                            :href="`https://github.com/sandrailievskaa/${project.repo}`"
                            target="_blank"
                            rel="noopener"
                            class="inline-flex shrink-0 items-center gap-1.5 font-mono text-xs font-medium text-accent-blue hover:text-paper"
                        >
                            <span class="sr-only">{{ project.name }} — </span>
                            View repository
                            <iconify-icon icon="tabler:arrow-up-right" width="14" height="14" aria-hidden="true"></iconify-icon>
                        </a>
                    </div>
                </div>

                <Modal :ref="(el) => (modalRefs[projectKey(project)] = el)" :label-id="`project-modal-title-${projectKey(project)}`">
                    <div class="flex flex-wrap gap-2">
                        <span
                            v-for="tag in project.tags"
                            :key="tag"
                            class="inline-flex items-center gap-1 rounded-full border border-ink-500 px-2.5 py-0.5 font-mono text-[10px] uppercase tracking-widest text-accent-blue"
                        >
                            <iconify-icon :icon="techIcon(tag)" width="11" height="11" aria-hidden="true"></iconify-icon>
                            {{ tag }}
                        </span>
                    </div>

                    <h3 :id="`project-modal-title-${projectKey(project)}`" class="mt-4 pr-8 text-xl font-semibold leading-snug text-paper">
                        {{ project.name }}
                    </h3>

                    <ul class="mt-5 space-y-2.5">
                        <li v-for="(bullet, bi) in project.bullets" :key="bi" class="flex gap-3 text-sm leading-relaxed text-paper-muted">
                            <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-accent-indigo" aria-hidden="true"></span>
                            <span>{{ bullet }}</span>
                        </li>
                    </ul>

                    <div class="mt-6 flex flex-wrap gap-1.5">
                        <span
                            v-for="tech in project.stack"
                            :key="tech"
                            class="inline-flex items-center gap-1 rounded-full bg-ink-700 px-2.5 py-1 font-mono text-[10px] text-paper-dim"
                        >
                            <iconify-icon :icon="techIcon(tech)" width="11" height="11" aria-hidden="true"></iconify-icon>
                            {{ tech }}
                        </span>
                    </div>

                    <a
                        v-if="project.repo"
                        :href="`https://github.com/sandrailievskaa/${project.repo}`"
                        target="_blank"
                        rel="noopener"
                        class="mt-6 inline-flex items-center gap-1.5 font-mono text-xs font-medium text-accent-blue transition-colors duration-200 ease-out hover:text-paper"
                    >
                        View repository
                        <iconify-icon icon="tabler:arrow-up-right" width="14" height="14" aria-hidden="true"></iconify-icon>
                    </a>
                </Modal>
            </article>

            <p v-if="filteredProjects.length === 0" class="text-paper-muted">No projects match this filter yet.</p>
        </div>
    </div>
</template>
