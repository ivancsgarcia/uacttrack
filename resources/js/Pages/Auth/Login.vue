<template>
    <div class="section flex flex-col justify-center items-center w-6/12 min-h-screen">
        <img src="../../../../public/images/UActTrack-logo.png" alt="uacttrack-logo" class="w-2/4 mb-10">

        <Form @submit.prevent="submit" class="flex flex-col justify-center items-center bg-ua-blue w-9/12 py-10 rounded-3xl">
            <h1 class="text-white text-5xl mb-16">Log In</h1>

            <!-- Email -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg">
                <div class="flex justify-center items-center px-4">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" color="gray" />
                </div>
                <div class="w-0.5 h-auto bg-gray-700"></div>
                <input type="email" v-model="form.email" placeholder="Email" class="input input-bordered w-full px-2 rounded-2xl text-xl focus:outline-none" />
            </div>
            <div v-if="form.errors.email" class="w-9/12 text-red-500 text-sm">{{form.errors.email}}</div>

            <!-- Password -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg mt-8">
                <div class="flex justify-center items-center px-4">
                    <font-awesome-icon :icon="['fas', 'lock']" size="2xl" color="gray" />
                </div>
                <div class="w-0.5 h-auto bg-gray-700"></div>
                <input type="password" v-model="form.password" placeholder="Password" class="input input-bordered w-full px-2 rounded-2xl text-xl focus:outline-none" />
            </div>
            <div v-if="form.errors.password" class="w-9/12 text-red-500 text-sm">{{form.errors.password}}</div>
            <!-- Forgot Password -->
            <div class="w-9/12 text-end text-white mt-1 mb-8">
                        <p>
                            <Link :href="route('forgot-password')" class="underline hover:text-blue-300">
                                Forgot Password?
                            </Link>
                        </p>
            </div>

            <!-- Log In Button -->
            <button :disabled="form.processing" class="bg-white rounded-xl text-2xl mb-12 w-1/3 h-14 text-ua-blue">
                Log In
            </button>

            <!-- Register Link -->
            <Link :href="route('register')">
                <p class="text-white rounded-lg text-lg underline hover:text-blue-300">Create an Account</p>
            </Link>
        </Form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { Link } from '@inertiajs/vue3';

const form = useForm({
    email: null,
    password: null,
    // remember: null
})

const submit = () => {
    form.post(route('login'), {
        onFinish: () => form.reset('password'),
    })
}
</script>
    
<style scoped>
    
</style>