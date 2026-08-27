<script setup>
import { onMounted } from 'vue';

onMounted(() => {
    const targets = document.querySelectorAll('.reveal, .reveal-child');

    if (!('IntersectionObserver' in window) || targets.length === 0) {
        targets.forEach((el) => el.classList.add('reveal-visible'));
        return;
    }

    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('reveal-visible');
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.15, rootMargin: '0px 0px -60px 0px' }
    );

    targets.forEach((el) => observer.observe(el));
});
</script>

<template>
    <span class="sr-only" aria-hidden="true"></span>
</template>
