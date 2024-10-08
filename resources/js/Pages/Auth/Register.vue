<script setup>
import { useForm, Link } from '@inertiajs/vue3';
import { watch } from 'vue';

defineProps({
    organizations: Array,
    admin_positions: Array,
    organization_positions: Array,
})

const form = useForm({
    role: "",
    organization: "",
    position: "",
    first_name: null,
    last_name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

watch(() => form.role, (value) => {
    if (value == 'Admin') {
        form.organization = "";
        form.position = "";
    }

    if (value == 'Student Officer') {
        form.organization = "";
        form.position = "";
    }
})

const submit = () => {

    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onError: () => form.reset('password', 'password_confirmation'),
    });
}
</script>

<template>
    <div class="section flex flex-col justify-center items-center w-6/12 min-h-screen py-8">
        <img src="../../../../public/images/UActTrack-logo.png" alt="uacttrack-logo" class="w-2/4 mb-10">

        <form @submit.prevent="submit" class="flex flex-col justify-center items-center bg-ua-blue w-9/12 py-10 rounded-3xl">
            <h1 class="text-white text-5xl mb-10">Registration</h1>

            <!-- Register As -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <select v-model="form.role" class="w-full rounded-lg text-xl px-2 focus:outline-none">
                    <option value="" selected disabled>Register As</option>
                    <option value="Admin">Admin</option>
                    <option value="Student Officer">Student Officer</option>
                </select>
            </div>
            <div v-if="form.errors.role" class="w-9/12 text-red-500 text-sm">{{form.errors.role}}</div>
            
            <!-- Organization -->
            <div v-if="form.role == 'Student Officer'" class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <select v-model="form.organization" class="w-full rounded-lg text-xl px-2 focus:outline-none">
                    <option value="" selected disabled>Select An Organization</option>
                    <option v-for="org in organizations" :key="org.id" :value="org.name">{{ org.name }}</option>
                </select>
            </div>
            <div v-if="form.errors.organization" class="w-9/12 text-red-500 text-sm">{{form.errors.organization}}</div>

            <!-- Student Officer Position -->
            <div v-if="form.role == 'Student Officer'" class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <select v-model="form.position" class="w-full rounded-lg text-xl px-2 focus:outline-none">
                    <option value="" selected disabled>Select Your Position</option>
                    <option v-for="orgPos in organization_positions" :key="orgPos.id" :value="orgPos.name">{{ orgPos.name }}</option>
                </select>
            </div>
            <div v-if="form.errors.position" class="w-9/12 text-red-500 text-sm">{{form.errors.role}}</div>

            <!-- Admin Position -->
            <div v-if="form.role == 'Admin'" class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <select v-model="form.position" class="w-full rounded-lg text-xl px-2 focus:outline-none">
                    <option value="" selected disabled>Select Your Position</option>
                    <option v-for="pos in admin_positions" :key="pos.id" :value="pos.name">{{ pos.name }}</option>
                </select>
            </div>
            <div v-if="form.errors.position" class="w-9/12 text-red-500 text-sm">{{form.errors.position}}</div>
            
            <!-- First Name -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <input type="text" v-model="form.first_name" placeholder="First Name" class="w-full px-2 rounded-lg text-xl focus:outline-none">
            </div>
            <div v-if="form.errors.first_name" class="w-9/12 text-red-500 text-sm">{{form.errors.first_name}}</div>

            <!-- Last Name -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <input type="text" v-model="form.last_name" placeholder="Last Name" class="w-full px-2 rounded-lg text-xl focus:outline-none">
            </div>
            <div v-if="form.errors.last_name" class="w-9/12 text-red-500 text-sm">{{form.errors.last_name}}</div>

            <!-- Email -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <input type="email" v-model="form.email" placeholder="email" class="w-full px-2 rounded-lg text-xl focus:outline-none">
            </div>
            <div v-if="form.errors.email" class="w-9/12 text-red-500 text-sm">{{form.errors.email}}</div>

            <!-- Password -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <input type="password" v-model="form.password" placeholder="Password" class="w-full px-2 rounded-lg text-xl focus:outline-none">
            </div>
            <div v-if="form.errors.password" class="w-9/12 text-red-500 text-sm">{{form.errors.password}}</div>

            <!-- Confirm Password -->
            <div class="flex w-9/12 h-14 bg-white rounded-lg mt-4">
                <input type="password" v-model="form.password_confirmation" placeholder="Confirm Password" class="w-full px-2 rounded-lg text-xl focus:outline-none">
            </div>

            <!-- Register Button -->
             <button :disabled="form.processing" class="bg-white rounded-xl text-2xl mt-10 mb-12 w-1/3 h-14 text-ua-blue">
                Register
            </button>

            <!-- Login Page Link -->
            <Link :href="route('login')" class="mx-auto underline text-white hover:text-blue-300">
                <div class="flex items-center">
                    <font-awesome-icon :icon="['fas', 'angle-left']" class="mr-2" />
                    <p>Back to Login Page</p>
                </div>
            </Link>
        </form>
    </div>
</template>

<style scoped>

</style>

