<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<template>
    <div class="side-menu">
        <div class="profile-section">
            <img
                :src="'images/sys-logos/UActTrack-logo.png'"
                alt="uacttrack-logo"
                class="mt-8 mb-12 mx-auto w-60"
            />
        </div>

        <div class="menu-items">
            <Link :href="route('admin-dashboard')">
                <div
                    :class="
                        route().current('admin-dashboard')
                            ? '!bg-ua-blue !text-white'
                            : ''
                    "
                    class="link"
                >
                    <p>To Be Approved</p>
                </div>
            </Link>

            <Link :href="route('admin-revision')">
                <div
                    :class="
                        route().current('admin-revision')
                            ? '!bg-ua-blue !text-white'
                            : ''
                    "
                    class="link"
                >
                    <p>Revisions</p>
                </div>
            </Link>

            <Link :href="route('admin-approved-apf')">
                <div
                    :class="
                        route().current('admin-approved-apf')
                            ? '!bg-ua-blue !text-white'
                            : ''
                    "
                    class="link"
                >
                    <p>Approved APF</p>
                </div>
            </Link>

            <Link :href="route('admin-rejected-apf')">
                <div
                    :class="
                        route().current('admin-rejected-apf')
                            ? '!bg-ua-blue !text-white'
                            : ''
                    "
                    class="link"
                >
                    <p>Rejected APF</p>
                </div>
            </Link>

            <Link :href="route('admin-send-copy')">
                <div
                    :class="
                        route().current('admin-send-copy')
                            ? '!bg-ua-blue !text-white'
                            : ''
                    "
                    class="link"
                >
                    <p>Send Copies</p>
                </div>
            </Link>
        </div>

        <Link :href="route('logout')" method="post" as="button">
            <div class="logout-section">
                <div>
                    <p>Log Out</p>
                </div>
            </div>
        </Link>
    </div>
</template>

<style scoped>
.side-menu {
    height: calc(100vh - 64px);
    width: 16rem;
    position: fixed;
    top: 70px;
    left: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    background-color: rgb(39 47 92 / 0.1);
}

.profile-section {
    text-align: center;
    margin-bottom: 1.25rem;
}

.image {
    margin: 2rem auto 3rem auto;
    width: 15rem;
}

.menu-items {
    flex-grow: 1;
    color: #272f5c;
    text-align: center;
    font-size: 1.25rem;
}

.menu-items div {
    background-color: #d9d9d9;
    padding: 12px 16px;
    margin: 5px auto;
}

.menu-items div:hover {
    background-color: rgba(39, 47, 92, 0.6);
    color: white;
}

.logout-section {
    background-color: #272f5c;
    text-align: center;
}

.logout-section:hover {
    background-color: #c41e3a;
}

.logout-section div {
    padding: 12px 16px;
    color: white;
}
</style>
