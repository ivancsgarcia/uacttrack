<template>
    <div class="container relative mx-auto mt-16 bg-ua-blue rounded-3xl">
        <img src="../../../public/images/UActTrack-logo-light.png" alt="uacttrack-logo" class="min-w-40 mx-auto py-8 pl-10">
        <div class="absolute right-0 bottom-0 mr-8 mb-8">
            <Link :href="route('activity-form')">
                <button class="text-ua-blue bg-white text-3xl py-4 px-12 rounded-xl">Start</button>
            </Link>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<style scoped>

</style>