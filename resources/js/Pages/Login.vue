<template>
    <div class="section flex flex-col justify-center items-center w-6/12 h-screen">
        <img src="../../../public/images/UActTrack-logo.png" alt="uacttrack-logo" class="w-2/4 mb-10">
        <Form class="flex flex-col justify-center items-center bg-ua-blue w-9/12 pt-20 pb-4 rounded-3xl">
            <h1 class="text-white text-5xl mb-24">Log In</h1>

            <InputGroup class="border-2 rounded-2xl flex w-9/12 h-14 bg-white mb-8">
                <InputGroupAddon class=" flex justify-center items-center p-2">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" color="gray" />
                </InputGroupAddon>
                <InputText placeholder="Email" class="w-full p-2 bg-transparent text-xl "/>
            </InputGroup>

            <InputGroup class="border-2 rounded-2xl flex w-9/12 h-14 bg-white mb-8">
                <InputGroupAddon class=" flex justify-center items-center p-2">
                    <font-awesome-icon :icon="['fas', 'lock']" size="2xl" color="gray" />
                </InputGroupAddon>
                <InputText placeholder="Password" class="w-full p-2 bg-transparent text-xl "/>
            </InputGroup>

            <Button label="Log In" class="bg-white rounded-2xl text-2xl mb-12 w-1/3 h-14" />

            <Link :href="route('register')">
                <p class="text-white rounded-lg text-lg underline">Create an Account</p>
            </Link>
        </Form>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
    
<style scoped>
    
</style>