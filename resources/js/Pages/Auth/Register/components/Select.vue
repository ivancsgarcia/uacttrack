<script setup>
defineProps({
    items: Array,
    name: String,
    id: String,
});
</script>

<template>
    <select :name="name" :id="id">
        <option v-for="(item, index) in items" :value="item" :key="index">
            {{ item }}
        </option>
    </select>
</template>
