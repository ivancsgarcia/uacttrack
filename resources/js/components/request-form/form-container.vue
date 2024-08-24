<script setup>
        defineProps({
            title: {
            type: String,
            default: 'No Input', // Default text if no prop is passed
            },
            link1: {
            type: String,
            default: 'No Input', // Default text if no prop is passed
            },
            link2: {
            type: String,
            default: 'No Input', // Default text if no prop is passed
            },
        })
</script>

<template>
    <div class="container">
        <div class="title">
            <p>{{ title }}</p>
        </div>

        <div class="links">
            <p>{{ link1 }}</p>
            <p class="line">|</p>
            <p>{{ link2 }}</p>
        </div>
    </div>
</template>

<style scoped>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 15px;
        margin-top: 15px;
    }

    .title, .links {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #D9D9D9;
        font-size: 2rem;
        padding: 10px;

    }

    .title {
        width: 50%;
    }

    .links {
        width: 20%;
    }

    .line {
        margin: 0 10px;
    }


</style>