<script setup></script>

<template>
    Background Image
    <div class="bg-img">
        <img src="/public/images/sys-logos/ua-logo.png" alt="UA-logo" />
    </div>

    Header
    <UAHeader />

    <div class="cont">
        Sidebar
        <SideMenu />

        Content
        <main class="content">
            <div class="account-section">
                <Account />

                <div class="icons-box">
                    <div>
                        <a href="https://mail.google.com/" target="_blank">
                            <font-awesome-icon
                                :icon="['fas', 'envelope']"
                                size="2xl"
                                class="icon"
                            />
                        </a>
                    </div>
                    <div>
                        <font-awesome-icon
                            @click="toggle"
                            :icon="['fas', 'bell']"
                            size="2xl"
                            class="icon"
                        />
                    </div>
                </div>
            </div>

            <div class="vertical-line"></div>

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
}

.content {
    margin-left: 16rem;
    padding: 1rem;
    flex: 1;
}

.account-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem;
}

.icons-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
}

.icon:hover {
    cursor: pointer;
    color: gold;
}

.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
}
</style>
