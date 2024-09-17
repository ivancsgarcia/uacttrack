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
                <div class="hover:!bg-ua-blue hover:text-white">
                    <p>Dashboard</p>
                </div>
            </Link>

            <Link :href="route('apf')">
                <div class="hover:!bg-ua-blue hover:text-white">
                    <p>Activity Proposal Form</p>
                </div>
            </Link>

            <Link :href="route('request-form')">
                <div class="hover:!bg-ua-blue hover:text-white">
                    <p>Forms</p>
                </div>
            </Link>
            
            <Link :href="route('recommendation')">
                <div class="hover:!bg-ua-blue hover:text-white">
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
  /* position: fixed;
  top: 0;
  left: 0; */
  /* width: 250px; */
  /* height: 100%; */
  /* background-color: rgba(39, 47, 92, 0.1); */
  /* padding-top: 20px; */
  /* display: flex; */
  /* flex-direction: column; */
  /* justify-content: space-between; */
  height: calc(100vh - 64px);
}

.profile-section {
  /* text-align: center;
  margin-bottom: 20px; */
}

.profile-section img {
  /* border-radius: 50%; */
  /* width: 250px; */
  /* height: 120px; */
}

.menu-items {
  /* list-style-type: none; */
  /* padding: 0; */
  flex-grow: 1;
}

.menu-items div {
  background-color: #D9D9D9;
  padding: 12px 16px;
  margin: 5px auto;
}

.menu-items div p {
  /* text-decoration: none; */
  /* display: block; */
  /* font-size: 18px; */
}

/* .menu-items div p:hover {
  background-color: #575757;
} */

.logout-section {
  /* padding: 16px; */
  /* text-align: center; */
}

.logout-section button {
  /* border: none; */
  /* color: white; */
  /* padding: 10px 20px; */
  /* font-size: 16px; */
  /* cursor: pointer; */
  /* border-radius: 4px; */
}

/* .logout-section button:hover {
  background-color: #ff1a1a;
} */
</style>