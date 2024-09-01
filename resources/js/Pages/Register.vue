<template>
    <div class="section flex flex-col justify-center items-center w-6/12 h-screen">
        <form @submit.prevent="submit" class="flex flex-col justify-center items-center bg-ua-blue w-9/12 pt-20 pb-4 rounded-3xl">
            <h1 class="text-white text-5xl mb-24">Registration</h1>

            <!-- <Select v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Register As" 
            class="flex items-center border-2 rounded-2xl w-9/12 h-14 bg-white mb-8 p-2 text-xl" />
            <Select v-model="selectedCity" :options="cities" optionLabel="name" placeholder="Select An Organization" 
            class="flex border-2 items-center rounded-2xl w-9/12 h-14 bg-white mb-8 p-2 text-xl" /> -->
            
            <InputText type="text" v-model="form.name" placeholder="Name" class="border-2 rounded-2xl w-9/12 h-14 bg-white mb-8 p-2 text-xl"/>
            <InputText type="text" v-model="form.email" placeholder="Email Address" class="border-2 rounded-2xl w-9/12 h-14 bg-white mb-8 p-2 text-xl"/>

            <InputText type="text" v-model="form.password" placeholder="Password" class="border-2 rounded-2xl w-9/12 h-14 bg-white mb-8 p-2 text-xl"/>
            <InputText type="text" v-model="form.password_confirmation" placeholder="Confirm Password" class="border-2 rounded-2xl w-9/12 h-14 bg-white mb-8 p-2 text-xl"/>

            <!-- <Button label="Register" class="bg-white rounded-2xl text-2xl mb-12 w-1/3 h-14" /> -->
             <button class="bg-white rounded-2xl text-2xl mb-12 w-1/3 h-14">Register</button>
        </form>
    </div>
</template>

<script setup>
import { router, useForm } from '@inertiajs/vue3';

// const selectedCity = ref();
// const cities = ref([
//     { name: 'New York', code: 'NY' },
//     { name: 'Rome', code: 'RM' },
//     { name: 'London', code: 'LDN' },
//     { name: 'Istanbul', code: 'IST' },
//     { name: 'Paris', code: 'PRS' }
// ]);

const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
})

const submit = () => {
    form.post(route('register'), {
        onError: () => form.reset('password', 'password_confirmation'),
    });
}
</script>

<style scoped>

</style>

