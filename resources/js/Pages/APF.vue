<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="body">
        <div class="content">
            <div class="img">
                <img
                    :src="'images/sys-logos/UActTrack-logo-light.png'"
                    alt="uacttrack-logo"
                />
            </div>
            <div class="btn-box">
                <Link :href="route('activity-form')">
                    <MyButton label="Start" />
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.body {
    width: 100vw;
    height: 100vh;
    background-color: #f2f2f2;
    display: flex;
    justify-content: center;
    padding: 4rem;
}

.content {
    position: relative;
    background-color: #272f5c;
    border-radius: 0.5rem;
    display: flex;
    justify-content: center;
    align-items: center;
}

.img {
    margin-left: 2rem;
}

.btn-box {
    position: absolute;
    right: 2rem;
    bottom: 2rem;
}
</style>
