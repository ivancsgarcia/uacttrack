<script setup>
    defineProps({
        title: {
        type: String,
        default: 'No Input', // Default text if no prop is passed
        },
    })
</script>

<template>
    <div class="box">
        <p>{{ title }}</p>
        <p>Activity Proposal Form</p>
    </div>
</template>

<style scoped>
    .box {
        display: flex;
        flex-direction: column;
        /* justify-content: center; */
        align-items: center;
        width: 300px;
        border-radius: 10px;
        background-color: #272F5C;
        color: white;
        padding: 20px 10px;
        text-align: center;
        font-size: 1.8rem;
    }
</style>