<script setup>
import { ref } from "vue";

// Define 'token' as a prop passed from Laravel
const props = defineProps({
    token: String,
});

// Create a local reactive variable to store the token
const token = ref(props.token);
</script>

<template>
    <div class="flex">
        <div class="w-1/2">
            <img
                :src="'images/sys-logos/UActTrack-no-logo.png'"
                alt="uacttrack-logo"
                class="w-3/4 m-auto"
            />

            <form action="{{ route('password.update') }}">
                <h1>Reset Password</h1>

                <input type="hidden" name="token" :value="token" />

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
