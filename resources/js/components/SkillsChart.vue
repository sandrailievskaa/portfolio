<script setup>
import { onMounted, ref } from 'vue';

const props = defineProps({
    categories: { type: Array, required: true },
});

const canvas = ref(null);

const palette = ['#f59e0b', '#3b82f6', '#818cf8', '#6366f1', '#4b5563'];

function waitForChart(callback, attempts = 0) {
    if (window.Chart) {
        callback();
        return;
    }
    if (attempts > 40) return;
    setTimeout(() => waitForChart(callback, attempts + 1), 50);
}

onMounted(() => {
    waitForChart(() => {
        new window.Chart(canvas.value.getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: props.categories.map((c) => c.label),
                datasets: [
                    {
                        data: props.categories.map((c) => c.count),
                        backgroundColor: props.categories.map((_, i) => palette[i % palette.length]),
                        borderColor: '#0a0a0f',
                        borderWidth: 2,
                        hoverOffset: 6,
                    },
                ],
            },
            options: {
                cutout: '68%',
                animation: { duration: 700, easing: 'easeOutQuart' },
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            color: '#9ca3af',
                            font: { family: "'JetBrains Mono', monospace", size: 11 },
                            boxWidth: 10,
                            boxHeight: 10,
                            padding: 16,
                        },
                    },
                    tooltip: {
                        backgroundColor: '#16161f',
                        borderColor: '#26262f',
                        borderWidth: 1,
                        titleColor: '#e4e4e7',
                        bodyColor: '#9ca3af',
                        titleFont: { family: "'JetBrains Mono', monospace", size: 12 },
                        bodyFont: { family: "'Inter', sans-serif", size: 12 },
                        padding: 10,
                        cornerRadius: 8,
                        boxPadding: 4,
                    },
                },
            },
        });
    });
});
</script>

<template>
    <div class="mx-auto w-full max-w-xs">
        <canvas ref="canvas" role="img" aria-label="Donut chart of skills distribution by category" height="240"></canvas>
    </div>
</template>
