<script setup>
import { ref } from "vue";
import { Link, useForm } from "@inertiajs/vue3";

// Create a reactive email variable
const email = ref("");

// Use Inertia's form helper for handling the POST request
const form = useForm({
    email: email.value,
});

// Handle the form submission
const submit = () => {
    form.post(route("password.request"));
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

            <div class="box">
                <form @submit.prevent="submit">
                    <h1 class="">Forgot Password</h1>

                    <p class="instructions">
                        Enter your email address to get instructions to reset
                        your password.
                    </p>

                    <div class="text-box">
                        <div class="icon-box">
                            <font-awesome-icon
                                :icon="['fas', 'envelope']"
                                size="2xl"
                                color="gray"
                            />
                        </div>
                        <div class="line"></div>
                        <input
                            type="email"
                            v-model="email"
                            placeholder="Email"
                            required
                        />
                    </div>

                    <button class="submit-btn">Send Reset Link</button>
                </form>

                <Link :href="route('login')" class="">
                    <div class="">
                        <font-awesome-icon
                            :icon="['fas', 'angle-left']"
                            class="mr-2"
                        />
                        <p class="login-link">Back to Login Page</p>
                    </div>
                </Link>
            </div>
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

h1 {
    color: white;
    font-size: 2rem;
    text-transform: uppercase;
    text-shadow: 3px 2px black;
    margin-bottom: 1rem;
    letter-spacing: 0.1rem;
}

.instructions {
    color: white;
    font-size: 1.2rem;
    text-align: center;
}

.box {
    width: 75%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #272f5c;
    border-radius: 3rem;
    padding: 3rem;
    box-shadow: 8px 8px 15px gray;
}

.text-box {
    display: flex;
    background-color: #fff;
    border-radius: 1rem;
    margin-top: 1.2rem;
    box-shadow: 2px 4px 10px black;
}

.line {
    width: 0.16rem;
    height: auto;
    background-color: lightgray;
}

.icon-box {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 1rem 1rem 1rem 1.5rem;
}

input {
    border-radius: 1.5rem;
    width: 100%;
    padding: 0 1rem;
    font-size: 1.5rem;
    color: #272f5c;
}

input:focus {
    outline: none;
}

.submit-btn {
    background-color: white;
    color: #272f5c;
    border-radius: 1.2rem;
    padding: 0.5rem 2rem;
    text-transform: uppercase;
    margin-top: 2.5rem;
    font-size: 1.5rem;
    letter-spacing: 0.1rem;
    font-weight: bold;
}

.submit-btn:hover {
    background-color: #6375bf;
    color: white;
}

.login-link {
    text-align: end;
    width: 100%;
    color: white;
    margin-top: 0.1rem;
    text-decoration: underline;
}

.login-link:hover {
    color: #93c5fd;
}
</style>
