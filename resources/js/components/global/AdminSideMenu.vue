<script setup>
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
const isVPA = page.props.auth.isVPA;
</script>

<template>
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="image">
                <img
                    :src="'images/sys-logos/UActTrack-logo.png'"
                    alt="uacttrack-logo"
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
                        <p>Dashboard</p>
                    </div>
                </Link>

                <Link :href="route('admin-pending-apf')">
                    <div
                        :class="
                            route().current('admin-pending-apf')
                                ? '!bg-ua-blue !text-white'
                                : ''
                        "
                        class="link"
                    >
                        <p>To Be Approved</p>
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

                <Link v-if="isVPA" :href="route('admin-send-copy')">
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

            <div class="logout-section">
                <Link :href="route('logout')" method="post">
                    <div class="logout">
                        <p>Log Out</p>
                    </div>
                </Link>
            </div>
        </div>
    </div>
</template>

<style scoped>
.sidebar {
    height: 100%;
    width: 16rem;
    position: fixed;
    overflow: auto;
    background-color: rgb(39 47 92 / 0.1);
}

.sidebar-content {
    min-height: 100%;
    position: relative;
}

.menu-items {
    color: #272f5c;
    text-align: center;
    font-size: 1.25rem;
}

.menu-items div {
    background-color: #d9d9d9;
    padding: 12px 0;
    margin: 5px auto;
}

.menu-items div:hover {
    background-color: rgba(39, 47, 92, 0.6);
    color: white;
}

.logout-section {
    position: absolute;
    bottom: 62px;
    width: 100%;
}

.logout {
    background-color: #272f5c;
    text-align: center;
    padding: 12px 16px;
    color: white;
}

.logout:hover {
    background-color: #c41e3a;
}
</style>
