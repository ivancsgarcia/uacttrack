<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="side-menu fixed top-16 left-0 flex flex-col justify-between h-screen w-64 pt-5 bg-ua-blue/10">
        <div class="profile-section text-center mb-5">
            <img src="../../../../public/images/UActTrack-logo.png" alt="uacttrack-logo" class="mt-8 mb-12 mx-auto w-60">
        </div>

        <div class="menu-items text-ua-blue text-center text-2xl">
            <Link :href="route('home')">
                <div :class="route().current('home') ? '!bg-ua-blue !text-white' : ''" class="hover:!bg-ua-blue/80 hover:text-white">
                    <p>Dashboard</p>
                </div>
            </Link>

            <Link :href="route('apf')">
                <div :class="route().current('apf') ? '!bg-ua-blue !text-white' : ''" class="hover:!bg-ua-blue/80 hover:text-white">
                    <p>Activity Proposal Form</p>
                </div>
            </Link>

            <Link :href="route('request-form')">
                <div :class="route().current('request-form') ? '!bg-ua-blue !text-white' : ''" class="hover:!bg-ua-blue/80 hover:text-white">
                    <p>Forms</p>
                </div>
            </Link>
            
            <Link :href="route('recommendation')">
                <div :class="route().current('recommendation') ? '!bg-ua-blue !text-white' : ''" class="hover:!bg-ua-blue/80 hover:text-white">
                    <p>Recommendation</p>
                </div>
            </Link>
        </div>

        <Link :href="route('logout')" method="post" as="button">
            <div class="logout-section p-4 bg-ua-blue text-xl text-center hover:!bg-red-500">
                    <div class="py-2 px-5 text-white">
                        <p>Log Out</p>
                    </div>
            </div>
        </Link>
    </div>
</template>

<style scoped>
    .side-menu {
  height: calc(100vh - 64px);
}

.menu-items {
  flex-grow: 1;
}

.menu-items div {
  background-color: #D9D9D9;
  padding: 12px 16px;
  margin: 5px auto;
}

</style>