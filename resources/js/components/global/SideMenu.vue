<script setup></script>

<template>
    <div class="sidebar">
        <div class="sidebar-content">
            <div class="image mb-4 p-4">
                <img
                    :src="'images/sys-logos/UActTrack-logo.png'"
                    alt="uacttrack-logo"
                />
            </div>

            <div class="menu-items">
                <Link :href="route('home')">
                    <div
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'Dashboard',
                        }"
                    >
                        <p>Dashboard</p>
                    </div>
                </Link>

                <Link :href="route('activity-form.create')">
                    <div
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'ActivityForm/index',
                        }"
                    >
                        <p>Activity Proposal Form</p>
                    </div>
                </Link>

                <Link :href="route('request-form')">
                    <div
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'RequestForm',
                        }"
                    >
                        <p>Request Forms</p>
                    </div>
                </Link>

                <Link :href="route('recommendation')">
                    <div
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'ExternalLinks',
                        }"
                    >
                        <p>Relevant Links</p>
                    </div>
                </Link>
            </div>

            <div class="logout-section">
                <Link
                    :href="route('logout')"
                    method="post"
                    as="button"
                    type="button"
                    class="w-full"
                >
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
