<script setup>
import { ref, watch } from "vue";

const props = defineProps({
    modelValue: {
        type: Boolean,
        required: true,
    },
    title: {
        type: String,
        default: "Modal Title",
    },
});

const emit = defineEmits(["update:modelValue"]);

const isVisible = ref(props.modelValue);

const closeModal = () => {
    isVisible.value = false;
};

watch(isVisible, (newVal) => {
    emit("update:modelValue", newVal);
});

watch(
    () => props.modelValue,
    (newVal) => {
        isVisible.value = newVal;
    }
);
</script>

<template>
    <div v-if="isVisible" class="modal-overlay" @click.self="closeModal">
        <div class="modal-content">
            <button class="close-button" @click="closeModal">✕</button>
            <header class="modal-header">
                <h3>{{ title }}</h3>
            </header>
            <section class="modal-body">
                <slot></slot>
            </section>
            <footer class="modal-footer">
                <button class="button" @click="closeModal">
                    Close
                </button>
            </footer>
        </div>
    </div>
</template>

<style scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(0, 0, 0, 0.6);
    z-index: 1000;
}

.modal-content {
    background: white;
    padding: 20px;
    width: 500px;
    border-radius: 10px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
    position: relative;
}

.close-button {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    background: transparent;
    border: none;
    cursor: pointer;
}

.modal-header h3 {
    margin: 0;
    font-size: 24px;
    text-align: center;
}

.modal-body {
    margin-top: 20px;
}

.modal-footer {
    display: flex;
    justify-content: center;
}

.button {
    padding: 8px 16px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    background: #3498db;
    color: white;
}
</style>
