<script setup>
import { router } from "@inertiajs/vue3";

const goBack = () => {
    const loginPage = "/login";

    if (window.location.pathname === loginPage) {
        window.location.href = "/";
    } else {
        window.history.back();
    }
};

const goHome = () => {
    router.get(route("home"));
};
</script>

<template>
    <div class="header">
        <!-- <div class="icons-box">
            <font-awesome-icon
                :icon="['fas', 'chevron-left']"
                @click="goBack"
                size="2xl"
                class="icon"
            />
            <font-awesome-icon
                :icon="['fas', 'house']"
                @click="goHome"
                size="2xl"
                class="icon"
            />
        </div> -->
        <div class="container">
            <img
                src="/public/images/sys-logos/ua-logo.png"
                alt="ua-logo"
                class="logo"
            />
            <h1>University of the Assumption</h1>
        </div>
    </div>
</template>

<style scoped>
.header {
    width: 100%;
    padding: 0.5rem 0;
    background-color: #272f5c;
    color: #fff;
    position: sticky;
    top: 0;
    z-index: 100;
}

.icons-box {
    position: absolute;
    top: 50%;
    left: 2rem;
    transform: translateY(-50%);
    display: flex;
    gap: 1.5rem;
}

.icon:hover {
    cursor: pointer;
    color: lightblue;
}

.container {
    display: flex;
    /* align-items: center; */
    justify-content: center;
    margin: auto;
    gap: 1rem;
}

.logo {
    width: 3rem;
}

h1 {
    font-size: 2rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    text-align: center;
}
</style>
