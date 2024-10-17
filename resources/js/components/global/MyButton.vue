<script setup>
import Button from "primevue/button";

const props = defineProps({
    label: String,
});
</script>

<template>
    <div class="card">
        <Button :label="label" />
    </div>
</template>

<style scoped>
.card {
    display: flex;
    justify-content: center;
}

.p-button {
    color: #272f5c;
    background: #fff;
    padding: 1rem 3rem;
    border-radius: 0.5rem;
    font-size: 1.5rem;
    outline: none;
    border: none;
}

.p-button:hover {
    background: lightblue !important;
    color: #f2f2f2 !;
    outline: none;
    border: none !important;
}
</style>
