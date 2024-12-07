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
        <div class="header-logo">
            <img src="/public/images/sys-logos/ua-logo.png" alt="ua-logo" />
            <h1>University of the Assumption</h1>
        </div>
    </header>
</template>

<style scoped>
header {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    background-color: #272f5c;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 10px 0;
    z-index: 1000;
}

.header-logo {
    display: flex;
    align-items: center;
}

.header-logo img {
    width: 3rem;
    margin-right: 10px;
}

.header-logo h1 {
    font-size: 2rem;
    font-weight: 500;
    text-transform: uppercase;
    letter-spacing: 0.1rem;
    text-align: center;
}

@media screen and (max-width: 425px) {
    .header-logo {
        flex-direction: column;
        align-items: center;
    }

    .header-logo img {
        margin-right: 0;
        margin-bottom: 5px;
    }

    .header-logo h1 {
        font-size: 1.5rem;
        letter-spacing: 0.05rem;
    }
}
</style>
