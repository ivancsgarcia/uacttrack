<template>
    <div class="box">
        <p>{{ title }}</p>
    </div>
</template>

<script>
    export default {
    props: {
        title: {
        type: String,
        default: 'No Input', // Default text if no prop is passed
        },
    },
    };
</script>

<style scoped>
    .box {
        background-color: rgba(39, 47, 92, 0.5);
        color: #000;
        border-radius: 10px;
        padding: 50px;
        font-size: 1.4rem;
    }
</style>