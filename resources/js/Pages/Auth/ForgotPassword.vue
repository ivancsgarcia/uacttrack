<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="flex flex-col justify-center items-center w-6/12 min-h-screen ">
        <img src="../../../../public/images/UActTrack-logo.png" alt="uacttrack-logo" class="w-2/4 mb-10">

        <div class="flex flex-col justify-center items-center bg-ua-blue w-9/12 py-10 rounded-3xl text-white">
            <h1 class="text-5xl text-center mb-16">Forgot Password</h1>

            <p class="mb-8 text-lg text-center">Enter your email address to get instructions to reset your password.</p>

            <input type="text" placeholder="Email" class="mb-6 p-2 rounded text-ua-blue text-xl w-9/12 h-14 focus:outline-none">
            <button class="text-ua-blue text-2xl bg-white rounded-lg mb-10 mx-48 w-1/3 h-14">Submit</button>
            <Link :href="route('login')" class="mx-auto underline hover:text-blue-300">
                <div class="flex items-center">
                    <font-awesome-icon :icon="['fas', 'angle-left']" class="mr-2" />
                    <p class="">Back to Login Page</p>
                </div>
            </Link>
        </div>
    </div>
</template>