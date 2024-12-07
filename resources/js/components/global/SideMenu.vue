<script setup>
import { Link } from "@inertiajs/vue3";</script>

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
                        :href="route('home')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'Dashboard',
                        }"
                        class="link"
                    >
                        Dashboard
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('activity-form.create')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'ActivityForm/index',
                        }"
                        class="link"
                    >
                        Activity Proposal Form
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('request-form')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'RequestForm',
                        }"
                        class="link"
                    >
                        Request Forms
                    </Link>
                </li>

                <li>
                    <Link
                        :href="route('recommendation')"
                        :class="{
                            '!bg-ua-blue !text-white':
                                $page.component === 'ExternalLinks',
                        }"
                        class="link"
                    >
                        Relevant Links
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
</style>
