<script setup>
import { ref } from 'vue';
import Modal from './Modal.vue';

const props = defineProps({
    papers: { type: Array, required: true },
});

const modalRefs = ref([]);

function openModal(index, event) {
    modalRefs.value[index]?.open(event.currentTarget);
}

function statusIcon(status) {
    return status === 'Presented' ? 'tabler:check' : 'tabler:clock';
}

function statusClass(status) {
    return status === 'Presented' ? 'border-accent-blue/40 text-accent-blue' : 'border-signal-amber/40 text-signal-amber';
}
</script>

<template>
    <div class="mt-12 grid gap-6 sm:grid-cols-2">
        <article
            v-for="(paper, i) in papers"
            :key="paper.title"
            class="research-card reveal-child rounded-2xl border border-ink-500 p-6"
            :style="{ transitionDelay: `${i * 60}ms` }"
        >
            <div class="flex items-start justify-between gap-4">
                <p class="font-mono text-xs uppercase tracking-widest text-paper-dim">{{ paper.venue }}</p>
                <span
                    class="inline-flex shrink-0 items-center gap-1.5 rounded-full border px-2.5 py-1 font-mono text-[10px] uppercase tracking-widest"
                    :class="statusClass(paper.status)"
                >
                    <iconify-icon :icon="statusIcon(paper.status)" width="11" height="11" aria-hidden="true"></iconify-icon>
                    {{ paper.status }}
                </span>
            </div>

            <h3 class="mt-3 text-lg font-medium leading-snug text-paper">{{ paper.title }}</h3>
            <p class="mt-3 text-sm leading-relaxed text-paper-muted">{{ paper.description }}</p>

            <button
                type="button"
                class="mt-4 inline-flex items-center gap-1.5 font-mono text-xs font-medium text-accent-blue transition-colors duration-200 ease-out hover:text-paper"
                @click="openModal(i, $event)"
            >
                Read more
                <iconify-icon icon="tabler:arrow-up-right" width="13" height="13" aria-hidden="true"></iconify-icon>
            </button>

            <Modal :ref="(el) => (modalRefs[i] = el)" :label-id="`research-modal-title-${i}`">
                <p class="font-mono text-xs uppercase tracking-widest text-paper-dim">{{ paper.venue }}</p>
                <span
                    class="mt-3 inline-flex items-center gap-1.5 rounded-full border px-2.5 py-1 font-mono text-[10px] uppercase tracking-widest"
                    :class="statusClass(paper.status)"
                >
                    <iconify-icon :icon="statusIcon(paper.status)" width="11" height="11" aria-hidden="true"></iconify-icon>
                    {{ paper.status }}
                </span>
                <h3 :id="`research-modal-title-${i}`" class="mt-4 pr-8 text-xl font-semibold leading-snug text-paper">
                    {{ paper.title }}
                </h3>

                <ul class="mt-5 space-y-2.5">
                    <li v-for="(bullet, bi) in paper.bullets" :key="bi" class="flex gap-3 text-sm leading-relaxed text-paper-muted">
                        <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-accent-indigo" aria-hidden="true"></span>
                        <span>{{ bullet }}</span>
                    </li>
                </ul>

                <div v-if="paper.tech && paper.tech.length" class="mt-6 flex flex-wrap gap-1.5">
                    <span
                        v-for="t in paper.tech"
                        :key="t"
                        class="rounded-full bg-ink-700 px-2.5 py-1 font-mono text-[10px] text-paper-dim"
                    >{{ t }}</span>
                </div>
            </Modal>
        </article>
    </div>
</template>
