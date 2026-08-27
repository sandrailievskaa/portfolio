<script setup>
import { ref } from 'vue';
import Modal from './Modal.vue';

const props = defineProps({
    certifications: { type: Array, required: true },
});

const modalRefs = ref([]);

function openModal(index, event) {
    modalRefs.value[index]?.open(event.currentTarget);
}
</script>

<template>
    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
        <article
            v-for="(cert, i) in certifications"
            :key="cert.title"
            class="card-hover reveal-child rounded-2xl border border-ink-500 p-6"
            :style="{ transitionDelay: `${i * 60}ms` }"
        >
            <iconify-icon icon="tabler:certificate" width="18" height="18" class="text-accent-blue" aria-hidden="true"></iconify-icon>
            <h3 class="mt-3 text-base font-medium leading-snug text-paper">{{ cert.title }}</h3>
            <p class="mt-1 font-mono text-xs uppercase tracking-widest text-paper-dim">{{ cert.issuer }} · {{ cert.date }}</p>

            <template v-if="cert.modules && cert.modules.length">
                <button
                    type="button"
                    class="mt-4 inline-flex items-center gap-1.5 font-mono text-xs font-medium text-accent-blue transition-colors duration-200 ease-out hover:text-paper"
                    @click="openModal(i, $event)"
                >
                    View modules
                    <iconify-icon icon="tabler:arrow-up-right" width="13" height="13" aria-hidden="true"></iconify-icon>
                </button>

                <Modal :ref="(el) => (modalRefs[i] = el)" :label-id="`cert-modal-title-${i}`">
                    <p class="font-mono text-xs uppercase tracking-widest text-paper-dim">{{ cert.issuer }} · {{ cert.date }}</p>
                    <h3 :id="`cert-modal-title-${i}`" class="mt-3 pr-8 text-xl font-semibold leading-snug text-paper">
                        {{ cert.title }}
                    </h3>
                    <ul class="mt-5 space-y-2.5">
                        <li v-for="(mod, mi) in cert.modules" :key="mi" class="flex gap-3 text-sm leading-relaxed text-paper-muted">
                            <span class="mt-2 h-1 w-1 shrink-0 rounded-full bg-accent-indigo" aria-hidden="true"></span>
                            <span>{{ mod }}</span>
                        </li>
                    </ul>
                </Modal>
            </template>
        </article>
    </div>
</template>
