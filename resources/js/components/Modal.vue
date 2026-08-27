<script setup>
import { ref } from 'vue';

defineProps({
    labelId: { type: String, required: true },
});

const dialog = ref(null);
let trigger = null;
let closing = false;

function open(triggerEl) {
    trigger = triggerEl ?? document.activeElement;
    closing = false;
    dialog.value?.showModal();
    requestAnimationFrame(() => {
        dialog.value?.classList.add('modal-visible');
    });
}

function close() {
    if (closing || !dialog.value?.open) return;
    closing = true;
    dialog.value.classList.remove('modal-visible');
    setTimeout(() => {
        dialog.value?.close();
    }, 200);
}

function onCancel(event) {
    event.preventDefault();
    close();
}

function onDialogClose() {
    closing = false;
    if (trigger && typeof trigger.focus === 'function') {
        trigger.focus();
    }
    trigger = null;
}

function onBackdropClick(event) {
    if (event.target === dialog.value) {
        close();
    }
}

defineExpose({ open, close });
</script>

<template>
    <dialog
        ref="dialog"
        class="modal-dialog"
        aria-modal="true"
        :aria-labelledby="labelId"
        @cancel="onCancel"
        @close="onDialogClose"
        @click="onBackdropClick"
    >
        <div class="modal-panel" @click.stop>
            <button type="button" class="modal-close" aria-label="Close dialog" @click="close">
                <iconify-icon icon="tabler:x" width="18" height="18" aria-hidden="true"></iconify-icon>
            </button>
            <slot />
        </div>
    </dialog>
</template>
