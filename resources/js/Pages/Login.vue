<template>
    <div class="section flex justify-center items-center w-6/12 h-screen">
        <Form class="flex flex-col justify-center items-center bg-ua-blue w-9/12">
            <h1 class="text-white ">Log In</h1>
            <InputGroup class="border-2 rounded-lg">
                <InputGroupAddon>
                    <i class="pi pi-user"></i>
                </InputGroupAddon>
                <InputText placeholder="Email" />
            </InputGroup>
            <InputText type="text" v-model="value"placeholder="Address" class="border-2 rounded-lg" />
            <Button label="Log In" class="bg-white" />
            <Link :href="route('register')">
                <p class="text-white rounded-lg">Create an Account</p>
            </Link>
        </Form>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';
</script>
    
<style scoped>
    
</style>