<template>
    <!-- Background Image -->
    <div class="bg-img">
        <img src="/public/images/sys-logos/ua-logo.png" alt="UA-logo" />
    </div>

    <!-- Header -->
    <UAHeader />

    <div class="main-content">
        <slot></slot>
    </div>
</template>

<style scoped>
.bg-img {
    position: fixed;
    right: 0;
    bottom: 0;
    z-index: -1;
    margin-bottom: -3rem;
    margin-right: -3rem;
}

.bg-img img {
    transform: rotate(15deg);
    width: 40rem;
    filter: grayscale(100%);
    opacity: 0.1;
}

.main-content {
    padding: 1rem;
}
</style>
