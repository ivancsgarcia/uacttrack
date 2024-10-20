<script setup>
import Dialog from "primevue/dialog";

const props = defineProps({
    visible: { type: Boolean, required: true },
    header: String,
    closable: { type: Boolean, default: true },
    width: String,
});

const emit = defineEmits(["close"]);

const closeModal = () => {
    emit("close");
};
</script>

<template>
    <Dialog
        :visible="visible"
        @update:visible="closeModal"
        :header="header"
        :modal="true"
        :closable="closable"
        :style="{ width: width }"
    >
        <slot></slot>
    </Dialog>
</template>
