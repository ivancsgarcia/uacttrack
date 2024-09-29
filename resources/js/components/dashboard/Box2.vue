<script setup>
const props = defineProps({
    title: String,
    data: Array,
    headers: Array,
});

const emit = defineEmits(['openModal']);

const handleClick = () => {
    emit('openModal', { title: props.title, headers: props.headers, data: props.data });
};

</script>

<template>
    <div @click="handleClick" class="box2 text-2xl text-black hover:!bg-ua-blue/80 hover:!text-gray-200">
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