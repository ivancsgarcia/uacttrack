<template>
    <div class="section flex flex-col justify-center items-center w-6/12 min-h-screen">
        <img src="../../../../public/images/UActTrack-logo.png" alt="uacttrack-logo" class="w-2/4 mb-10">

        <Form @submit.prevent="submit" class="flex flex-col justify-center items-center bg-ua-blue w-9/12 pt-20 pb-4 rounded-3xl">
            <h1 class="text-white text-5xl mb-16">Log In</h1>

            <div class="flex w-9/12 h-14 bg-white rounded-2xl mb-8">
                <div class="flex justify-center items-center px-4">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" color="gray" />
                </div>
                <div class="w-0.5 h-auto bg-gray-700"></div>
                <input type="email" v-model="form.email" placeholder="Email" class="input input-bordered w-full px-4 rounded-2xl text-xl" />
            </div>
            <div v-if="form.errors.email" class="w-9/12 text-red-500 text-sm">{{form.errors.email}}</div>

            <div class="flex w-9/12 h-14 bg-white rounded-2xl mb-16">
                <div class="flex justify-center items-center px-4">
                    <font-awesome-icon :icon="['fas', 'lock']" size="2xl" color="gray" />
                </div>
                <div class="w-0.5 h-auto bg-gray-700"></div>
                <input type="password" v-model="form.password" placeholder="Password" class="input input-bordered w-full px-4 rounded-2xl text-xl" />
            </div>
            <div v-if="form.errors.password" class="w-9/12 text-red-500 text-sm">{{form.errors.password}}</div>


            <button :disabled="form.processing" class="bg-white rounded-2xl text-2xl mb-12 w-1/3 h-14">
                Log In
            </button>

            <Link :href="route('register')">
                <p class="text-white rounded-lg text-lg underline">Create an Account</p>
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