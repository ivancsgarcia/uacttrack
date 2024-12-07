<template>
    <!-- Background Image -->
    <div class="bg-img">
        <img src="/public/images/sys-logos/ua-logo.png" alt="UA-logo" />
    </div>

    <!-- Header -->
    <UAHeader />
    <div class="cont">
        <main class="content">
            <slot></slot>
        </main>
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

.cont {
    display: flex;
    margin-top: 60px;
    min-height: calc(100vh - 60px);
    display: flex;
    align-items: center;
}

.content {
    padding: 1rem;
    flex: 1;
}
</style>
