<script setup>
import { useForm, Link, Head } from "@inertiajs/vue3";
import AuthLayout from "../../../Layouts/AuthLayout.vue";
import InputBox from "./components/InputBox.vue";

defineProps({
    status: String,
});

const form = useForm({
    email: null,
    password: null,
});

const onSubmit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
        onError: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title=" | Login" />

    <AuthLayout>
        <form
            @submit.prevent="onSubmit"
            class="w-[500px] rounded-xl bg-indigo-900 p-8 text-white"
        >
            <h1
                class="h1-shadow mb-4 text-center text-2xl font-bold uppercase tracking-widest text-white"
            >
                Login
            </h1>

            <div class="mb-4">
                <label for="email" class="mb-1 block">Email</label>
                <InputBox
                    icon="mdi:email"
                    type="email"
                    name="email"
                    id="email"
                    v-model="form.email"
                    placeholder="j.dela-cruz.student@ua.edu.ph"
                />
                <div v-if="form.errors.email" class="mt-1 text-red-300 text-sm">
                    {{ form.errors.email }}
                </div>
            </div>

            <div class="">
                <label for="password" class="mb-1 block">Password</label>
                <InputBox
                    icon="mdi:password"
                    type="password"
                    name="password"
                    id="password"
                    v-model="form.password"
                    placeholder="Enter your password"
                />
                <div v-if="form.errors.email" class="mt-1 text-red-300 text-sm">
                    {{ form.errors.email }}
                </div>
            </div>

            <div class="mt-1 mb-4">
                <p>
                    <Link :href="route('password.request')" class="underline">
                        Forgot Password?
                    </Link>
                </p>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="w-full rounded-md border bg-white p-3 font-bold uppercase tracking-wider text-black mb-8"
            >
                Login
            </button>

            <p class="text-white text-center">
                Don't have an account?
                <Link :href="route('register')" class="underline">Sign up</Link>
            </p>
        </form>
    </AuthLayout>
</template>

<style scoped>
.h1-shadow {
    text-shadow: 3px 2px black;
}
</style>
