<script setup>
import { useForm } from "@inertiajs/vue3";
import { Link } from "@inertiajs/vue3";

const form = useForm({
    email: null,
    password: null,
    // remember: null
});

const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
    });
};
</script>

<template>
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
                <h1>Log In</h1>

                <!-- Email -->
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
                        v-model="form.email"
                        placeholder="Email"
                    />
                </div>
                <div v-if="form.errors.email" class="error">
                    {{ form.errors.email }}
                </div>

                <!-- Password -->
                <div class="text-box">
                    <div class="icon-box">
                        <font-awesome-icon
                            :icon="['fas', 'lock']"
                            size="2xl"
                            color="gray"
                        />
                    </div>
                    <div class="line"></div>
                    <input
                        type="password"
                        v-model="form.password"
                        placeholder="Password"
                    />
                </div>
                <div v-if="form.errors.password" class="error">
                    {{ form.errors.password }}
                </div>

                <!-- Forgot Password -->
                <div class="forgot-password">
                    <p>
                        <Link :href="route('forgot-password')" class="link">
                            Forgot Password?
                        </Link>
                    </p>
                </div>

                <!-- Log In Button -->
                <button :disabled="form.processing" class="login-btn">
                    Log In
                </button>

                <!-- Register Link -->
                <!-- <Link :href="route('register')">
                    <p>Create an Account</p>
                </Link> -->
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
    width: 900px;
    height: auto;
    min-width: 200px;
    filter: grayscale(100%);
    opacity: 0.2;
}

.content {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    width: 50%;
}

form {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    background-color: #272f5c;
    border-radius: 3rem;
    padding: 4rem 4rem;
    box-shadow: 8px 8px 15px black;
    margin-top: 2rem;
}

h1 {
    color: white;
    font-size: 3rem;
    text-transform: uppercase;
    text-shadow: 3px 2px black;
    margin-bottom: 1.5rem;
    letter-spacing: 0.1rem;
}

.text-box {
    display: flex;
    background-color: #fff;
    border-radius: 1.5rem;
    margin-top: 2rem;
    box-shadow: 2px 4px 10px black;
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

.line {
    width: 0.16rem;
    height: auto;
    background-color: lightgray;
}

.error {
    color: #ef4444;
    width: 100%;
}

.forgot-password {
    text-align: end;
    width: 100%;
    color: white;
    margin-top: 0.1rem;
}

.forgot-password .link {
    text-decoration: underline;
    letter-spacing: 0.1rem;
}

.forgot-password .link:hover {
    color: #93c5fd;
}

.login-btn {
    background-color: white;
    color: #272f5c;
    border-radius: 1.2rem;
    padding: 0.8rem 3rem;
    text-transform: uppercase;
    margin-top: 2.5rem;
    font-size: 1.5rem;
    letter-spacing: 0.1rem;
    font-weight: bold;
}

.login-btn:hover {
    background-color: #93c5fd;
    color: white;
}
</style>
