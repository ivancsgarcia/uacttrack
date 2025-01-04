<script setup>
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage();
const user = page.props.auth.user;
</script>

<template>
    <aside class="sidebar">
        <div class="sidebar-logo">
            <img
                :src="'images/sys-logos/UActTrack-logo.png'"
                alt="uacttrack-logo"
            />
        </div>

        <nav>
            <ul>
                <li>
                    <Link
                        :href="route('admin-dashboard')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'Admin/AdminDashboard',
                        }"
                        class="link"
                    >
                        Dashboard
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('admin-pending-apf')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'Admin/AdminPendingAPF',
                        }"
                        class="link"
                    >
                        To Be Approved
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('admin-approved-apf')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'Admin/AdminApprovedAPF',
                        }"
                        class="link"
                    >
                        Approved APF
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('admin-rejected-apf')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'Admin/AdminRejectedAPF',
                        }"
                        class="link"
                    >
                        Rejected APF
                    </Link>
                </li>

                <li>
                    <Link
                        v-if="user.position === 'Vice President for Administration'"
                        :href="route('admin-send-copy')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'Admin/AdminSendCopy',
                        }"
                        class="link"
                    >
                        Send Copies
                    </Link>
                </li>
            </ul>
        </nav>

        <div class="logout">
            <Link
                :href="route('logout')"
                method="post"
                as="button"
                type="button"
                class="w-full"
            >
                Log Out
            </Link>
        </div>
    </aside>
</template>

<style scoped>
.sidebar {
    position: fixed;
    top: 60px;
    left: 0;
    width: 16rem;
    height: calc(100% - 60px);
    background-color: rgb(39 47 92 / 0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 10px;
}

.sidebar-logo img {
    /* width: 100%; */
    max-height: 80px;
    margin: 20px auto;
}

.sidebar nav ul {
    list-style: none;
}

.sidebar nav ul li {
    margin: 10px 0;
}

.sidebar nav ul li .link {
    text-decoration: none;
    font-size: 1.25rem;
    /* background-color: #d9d9d9; */
    color: #272f5c;
    display: block;
    padding: 12px;
    transition: background 0.3s;
}

.sidebar nav ul li .link:hover {
    background-color: rgba(39, 47, 92, 0.6);
    color: #fff;
}

.logout {
    margin-top: auto;
}

.logout button {
    width: 100%;
    padding: 10px;
    background-color: #e74c3c;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.logout button:hover {
    background-color: #c0392b;
}

/* .sidebar {
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
} */
</style>
