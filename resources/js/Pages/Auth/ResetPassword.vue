<script setup>
import { useForm } from "@inertiajs/vue3";

const props = defineProps({
    token: String,
    email: String,
});

const form = useForm({
    token: props.token,
    email: props.email,
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route(""), {
        onFinish: () => {
            form.reset("password", "password_confirmation");
        },
    });
};
</script>

<template>
    <Head title="Reset Password" />
    <div class="flex">
        <div class="w-1/2">
            <img
                :src="'images/sys-logos/UActTrack-no-logo.png'"
                alt="uacttrack-logo"
                class="w-3/4 m-auto"
            />

            <form @submit.prevent="submit">
                <h1>Reset Password</h1>

                <div class="block">
                    <input type="hidden" name="token" :value="token" />
                </div>

                <!-- Email -->
                <div class="text-box">
                    <input
                        type="email"
                        v-model="form.email"
                        placeholder="Email"
                    />
                </div>
                <div v-if="form.errors.email" class="error">
                    {{ form.errors.email }}
                </div>

                <!-- Password -->
                <div class="text-box">
                    <input
                        type="password"
                        v-model="form.password"
                        placeholder="Password"
                    />
                </div>
                <div v-if="form.errors.password" class="error">
                    {{ form.errors.password }}
                </div>

                <!-- Confirm Password -->
                <div class="text-box">
                    <input
                        type="password"
                        v-model="form.password_confirmation"
                        placeholder="Confirm Password"
                    />
                </div>

                <!-- Register Button -->
                <button :disabled="form.processing" class="register-btn">
                    Reset Password
                </button>
            </form>
        </div>
    </div>
</template>
