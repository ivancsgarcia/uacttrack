<template>
    <div>
        <font-awesome-icon :icon="['fas', 'chevron-left']" />
        <font-awesome-icon :icon="['fas', 'house']" />
        <h1>{{ title }}</h1>
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
    div {
        position: fixed;
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 8vh;
        background-color: #272F5C;
        color: #fff;
    }
</style>