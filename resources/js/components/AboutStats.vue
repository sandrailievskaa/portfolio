<script setup>
import { ref, onMounted } from 'vue';

const props = defineProps({
    stats: { type: Array, required: true },
});

const displayValues = ref(props.stats.map(() => 0));
const root = ref(null);
let animated = false;

function animate() {
    if (animated) return;
    animated = true;

    props.stats.forEach((stat, i) => {
        const target = parseInt(stat.value, 10);

        if (Number.isNaN(target)) {
            displayValues.value[i] = stat.value;
            return;
        }

        const duration = 1100;
        const start = performance.now();

        function tick(now) {
            const progress = Math.min((now - start) / duration, 1);
            const eased = 1 - Math.pow(1 - progress, 3);
            displayValues.value[i] = Math.round(target * eased);
            if (progress < 1) requestAnimationFrame(tick);
        }

        requestAnimationFrame(tick);
    });
}

onMounted(() => {
    if (!('IntersectionObserver' in window) || !root.value) {
        animate();
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    animate();
                    observer.disconnect();
                }
            });
        },
        { threshold: 0.4 }
    );

    observer.observe(root.value);
});
</script>

<template>
    <dl ref="root" class="mt-10 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <div
            v-for="(stat, i) in stats"
            :key="i"
            class="reveal-child border-l-2 border-accent-indigo/60 pl-4"
            :style="{ transitionDelay: `${i * 60}ms` }"
        >
            <dt class="font-mono text-3xl font-semibold text-paper">
                {{ displayValues[i] }}<span class="text-accent-blue">{{ stat.suffix }}</span>
            </dt>
            <dd class="mt-1 text-sm text-paper-muted">{{ stat.label }}</dd>
        </div>
    </dl>
</template>
