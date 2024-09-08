<template>
    <div class="section flex flex-col justify-center items-center w-6/12 min-h-screen">
        <img src="../../../../public/images/UActTrack-logo.png" alt="uacttrack-logo" class="w-2/4 mb-10">

        <form @submit.prevent="submit" class="flex flex-col justify-center items-center bg-ua-blue w-9/12 pt-20 pb-4 rounded-3xl">
            <h1 class="text-white text-5xl mb-10">Registration</h1>

            <div class="flex w-9/12 h-14 bg-white rounded-2xl mt-4">
                <select v-model="form.role" class="w-full rounded-2xl text-xl px-4">
                <option value="" selected disabled>Register As</option>
                <option value="Admin">Admin</option>
                <option value="Student Officer">Student Officer</option>
            </select>
            </div>
            <div v-if="form.errors.role" class="w-9/12 text-red-500 text-sm">{{form.errors.role}}</div>
            
            <div class="flex w-9/12 h-14 bg-white rounded-2xl mt-4">
                <select v-model="form.organization" class="w-full rounded-2xl text-xl px-4">
                <option value="" selected disabled>Select An Organization</option>
                <option v-if="form.role === 'Admin'" value="None" >None</option>
                <option value="AAA" >AAA</option>
                <option value="BACC" >BACC</option>
                <option value="BHSPHS" >BHSPHS</option>
                <option value="CDW" >CDW</option>
                <option value="CHARMS" >CHARMS</option>
                <option value="CRYCYC" >CRYCYC</option>
                <option value="CREATE" >CREATE</option>
                <option value="ICPEP" >ICPEP</option>
                <option value="INA" >INA</option>
                <option value="JPIA" >JPIA</option>
                <option value="JPPHA" >JPPHA</option>
                <option value="LEAD" >LEAD</option>
                <option value="LTSP" >LTSP</option>
                <option value="MCSA" >MCSA</option>
                <option value="NSC" >NSC</option>
                <option value="PICE" >PICE</option>
                <option value="PIIE" >PIIE</option>
                <option value="PSYCHSOC" >PSYCHSOC</option>
                <option value="SSITE" >SSITE</option>
                <option value="CSC" >University of the Assumption –
                    Central Student Council</option>
                <option value="SAO" >University of the Assumption –
                    Student Assistants Organization</option>
            </select>
            </div>
            <div v-if="form.errors.organization" class="w-9/12 text-red-500 text-sm">{{form.errors.organization}}</div>
            
            <div class="flex w-9/12 h-14 bg-white rounded-2xl mt-4">
                <input type="text" v-model="form.firstName" placeholder="First Name" class="w-full px-4 rounded-2xl text-xl">
            </div>
            <div v-if="form.errors.firstName" class="w-9/12 text-red-500 text-sm">{{form.errors.firstName}}</div>

            <div class="flex w-9/12 h-14 bg-white rounded-2xl mt-4">
                <input type="text" v-model="form.lastName" placeholder="Last Name" class="w-full px-4 rounded-2xl text-xl">
            </div>
            <div v-if="form.errors.lastName" class="w-9/12 text-red-500 text-sm">{{form.errors.lastName}}</div>

            <div class="flex w-9/12 h-14 bg-white rounded-2xl mt-4">
                <input type="email" v-model="form.email" placeholder="email" class="w-full px-4 rounded-2xl text-xl">
            </div>
            <div v-if="form.errors.email" class="w-9/12 text-red-500 text-sm">{{form.errors.email}}</div>

            <div class="flex w-9/12 h-14 bg-white rounded-2xl mt-4">
                <input type="password" v-model="form.password" placeholder="Password" class="w-full px-4 rounded-2xl text-xl">
            </div>
            <div v-if="form.errors.password" class="w-9/12 text-red-500 text-sm">{{form.errors.password}}</div>

            <div class="flex w-9/12 h-14 bg-white rounded-2xl mt-4">
                <input type="password" v-model="form.password_confirmation" placeholder="Confirm Password" class="w-full px-4 rounded-2xl text-xl">
            </div>

             <button type="submit" :disabled="form.processing" class="bg-white rounded-2xl text-2xl mt-10 mb-12 w-1/3 h-14">
                Register
            </button>
        </form>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

const form = useForm({
    role: "",
    organization: "",
    firstName: null,
    lastName: null,
    email: null,
    password: null,
    password_confirmation: null,
})

const submit = () => {

    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
        onError: () => form.reset('password', 'password_confirmation'),
    });
}
</script>

<style scoped>

</style>

