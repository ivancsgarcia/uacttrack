<script setup>
import { defineEmits } from "vue";

defineProps({
    title: {
        type: String,
        required: true,
    },
});

</script>

<template>
    <div
        @click="$emit('openModal')"
        class="box2 text-2xl text-black hover:!bg-ua-blue/80 hover:!text-gray-200"
    >
        <h3>{{ title }}</h3>
    </div>
</template>

<style scoped>
.box2 {
    background-color: rgba(39, 47, 92, 0.5);
    border-radius: 10px;
    padding: 50px;

    cursor: pointer;
    transition: background-color 0.3s;
}

.box2:hover {
    background-color: #e9e9e9;
}
</style>
