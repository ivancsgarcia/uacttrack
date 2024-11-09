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
    <header>
        <div class="ua-header">
            <div class="icons-box">
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
            </div>
            <div class="logo-container">
                <img
                    :src="`images/sys-logos/ua-logo.png`"
                    alt="ua-logo"
                    class="logo"
                />
            </div>
            <div><h1>University of the Assumption</h1></div>
        </div>
    </header>
</template>

<style scoped>
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 50;
}

.ua-header {
    display: flex;
    justify-content: center;
    align-self: center;
    padding: 0.5rem 0;
    background-color: #272f5c;
    color: #fff;
    position: relative;
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

.logo-container {
    margin-right: 0.5rem;
}

.logo {
    width: 3.5rem;
}

h1 {
    font-size: 2rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    text-align: center;
}
</style>
