<template>
    <div class="container flex flex-col items-end rounded-3xl">
        <img src="../../../public/images/UActTrack-logo-light.png" alt="uacttrack-logo">
        <Link :href="route('activity-form')">
            <button class="text-ua-blue bg-white rounded-lg py-5 px-20 text-4xl">Start</button>
        </Link>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>
    .container {
        /* justify-content: center; */
        height: 80vh;
        width: 80vw;
        margin: 70px auto;
        background-color: #272F5C;
        padding: 60px 100px;
    }

    img {
        width: 1000px;
        margin: auto;
    }

</style>