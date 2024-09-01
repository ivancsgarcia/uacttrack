<script setup>
    defineProps({
        title: {
        type: String,
        default: 'No Input', // Default text if no prop is passed
        },
    })
</script>

<template>
    <div class="box text-2xl text-black">
        <p>{{ title }}</p>
    </div>
</template>



<style scoped>
    .box {
        background-color: rgba(39, 47, 92, 0.5);
        border-radius: 10px;
        padding: 50px;
    }
</style>