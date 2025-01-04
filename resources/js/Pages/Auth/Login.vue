<script setup>
import { useForm, Link } from "@inertiajs/vue3";

defineProps({
    status: String,
});

const form = useForm({
    email: null,
    password: null,
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
    <Head title=" | Login" />
    <div class="body">
        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="content">
            <img
                :src="'images/sys-logos/UActTrack-logo.png'"
                alt="UActTrack-logo"
            />

            <Form @submit.prevent="submit">
                <h1 class="text-white text-3xl uppercase tracking-wider h1-shadow mb-4">Log In</h1>

                {{ status }}
                <!-- Email -->
                <div class="w-full mb-4">
                    <InputGroup>
                        <InputGroupAddon>
                            <i class="pi pi-envelope"></i>
                        </InputGroupAddon>
                        <InputText
                            type="email"
                            v-model="form.email"
                            placeholder="Email"
                            size="large"
                        />
                    </InputGroup>
                    <div v-if="form.errors.email" class="error">
                        * {{ form.errors.email }}
                    </div>
                </div>

                <!-- Password -->
                <div class="w-full">
                    <InputGroup>
                        <InputGroupAddon>
                            <i class="pi pi-lock"></i>
                        </InputGroupAddon>
                        <Password
                            v-model="form.password"
                            toggleMask
                            placeholder="Password"
                            :feedback="false"
                            size="large"
                        />
                    </InputGroup>
                    <div v-if="form.errors.password" class="error">
                        * {{ form.errors.password }}
                    </div>
                </div>

                <!-- Forgot Password -->
                <div class="forgot-password mb-4">
                    <p>
                        <Link :href="route('password.request')" class="link">
                            Forgot Password?
                        </Link>
                    </p>
                </div>

                <!-- Log In Button -->
                <Button
                    type="submit"
                    :disabled="form.processing"
                    label="LOG IN"
                    size="large"
                    class="block bg-white text-ua-blue hover:bg-ua-blue hover:text-white"
                />

                <!-- Register Link -->
                <p class="mt-8 mb-4 text-white">
                    Don't have an account?
                    <Link :href="route('register')" class="underline"
                        >Register</Link
                    >
                </p>
            </Form>
        </div>
    </div>
</template>

<style scoped>
.body {
    height: 100vh;
    /* background-color: gray; */
    position: relative;
    display: flex;
}

.bg-img {
    position: fixed;
    right: 0;
    bottom: 0;
    z-index: -1;
    margin-bottom: -3rem;
    margin-right: -3rem;
}

.bg-img img {
    transform: rotate(15deg);
    width: 40rem;
    height: auto;
    filter: grayscale(100%);
    opacity: 0.1;
}

.content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 50%;
}

.content img {
    width: 20rem;
    height: auto;
    margin-bottom: 0.5rem;
}

form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #272f5c;
    border-radius: 2rem;
    padding: 2rem 3rem;
    box-shadow: 8px 8px 15px gray;
}

.h1-shadow {
    text-shadow: 3px 2px black;
}

.error {
    color: #ef4444;
    width: 100%;
}

.forgot-password {
    text-align: end;
    width: 100%;
    color: white;
    margin-top: 0.4rem;
}

.forgot-password .link {
    text-decoration: underline;
    /* letter-spacing: 0.1rem; */
}

.forgot-password .link:hover {
    color: #93c5fd;
}
</style>
