<script setup>
import { router, usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);

const goBack = () => {
    window.history.back();
};
const goHome = () => {
    (user.value.role === 'Admin') ? router.get(route('admin-dashboard')) : router.get(route('home'));
}
const goForward = () => {
    window.history.forward();
};

</script>

<template>
    <header>
        <div class="header-container">
            <div class="nav-buttons">
                <Button @click="goBack" icon="pi pi-angle-left text-3xl" class="icon-btn" />
                <Button @click="goHome" icon="pi pi-home text-3xl" class="icon-btn" />
                <Button @click="goForward" icon="pi pi-angle-right text-3xl" class="icon-btn" />
            </div>

            <div class="header-logo">
                <img src="/public/images/sys-logos/ua-logo.png" alt="ua-logo" />
                <h1>University of the Assumption</h1>
            </div>

            <Button @click="" icon="pi pi-bars text-3xl" class="icon-btn" />

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
    padding: 10px 0;
    z-index: 1000;
}

.header-container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 1rem;
}

.nav-buttons {
    display: flex;
    gap: 1rem;
}

.icon-btn {
    background: none;
    border: none;
    color: white;
    font-size: 1.5rem;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.header-logo {
    display: flex;
    align-items: center;
    
    justify-content: center;
    flex-grow: 1;
    text-align: center;
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
}

@media screen and (max-width: 425px) {
    .header-container {
        justify-content: space-between;
    }
    
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
