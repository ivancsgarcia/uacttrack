<template>
    <div @click="$emit('click')" class="box text-2xl text-black">
        <p>{{ title }}</p>
    </div>
</template>

<script setup>
    defineProps({
        title: {
        type: String,
        default: 'No Input', // Default text if no prop is passed
        },
    });
</script>

<style scoped>
    .box {
        background-color: rgba(39, 47, 92, 0.5);
        border-radius: 10px;
        padding: 50px;
    }
</style>