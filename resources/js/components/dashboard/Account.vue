<template>
    <div class="flex">
        <div class="round-avatar flex"></div>
        <div class="flex text">
            <p>Welcome,</p>
            <p class="name">{{ name }}</p>
        </div>
    </div>
</template>

<script>
    export default {
    props: {
        name: {
        type: String,
        default: 'No Input', // Default text if no prop is passed
        },
    },
    };
</script>

<style scoped>
    .flex {
        display: flex;
    }

    .round-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: gray;
    }

    .text {
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .text p {
        font-size: 1.8rem;
    }

    .name {
        font-weight: bold;
    }
</style>