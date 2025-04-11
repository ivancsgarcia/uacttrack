<script setup>
import { useForm, Link } from "@inertiajs/vue3";
import { watch } from "vue";

defineProps({
    organizations: Object,
    organization_positions: Array,
    admin_positions: Array,
    registerAs: Array,
});

const form = useForm({
    role: "",
    organization_id: "",
    position: "",
    first_name: null,
    last_name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

watch(
    () => form.role,
    (value) => {
        if (value == "Admin") {
            form.organization = "";
            form.position = "";
        }

        if (value == "Student Officer") {
            form.organization = "";
            form.position = "";
        }
    }
);

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset(),
        onError: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <Head title="| Register" />
    <div class="body">
        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="content">
            <img
                :src="'images/sys-logos/UActTrack-logo.png'"
                alt="UActTrack-logo"
            />

            <form @submit.prevent="submit">
                <h1
                    class="text-white text-3xl text-center uppercase tracking-wider h1-shadow mb-4"
                >
                    Registration
                </h1>

                <!-- Register As -->
                <Select
                    v-model="form.role"
                    :options="registerAs"
                    placeholder="Register as"
                    size="large"
                    class="w-3/4 mb-4"
                />
                <div v-if="form.errors.role" class="error">
                    {{ form.errors.role }}
                </div>

                <!-- Student Officer Position -->
                <Select
                    v-if="form.role == 'Student Officer'"
                    v-model="form.position"
                    :options="organization_positions"
                    placeholder="Select your position"
                    size="large"
                    class="w-3/4 mb-4"
                />
                <div v-if="form.errors.position" class="error">
                    {{ form.errors.role }}
                </div>

                <!-- Admin Position -->
                <Select
                    v-if="form.role == 'Admin'"
                    v-model="form.position"
                    :options="admin_positions"
                    placeholder="Select your position"
                    size="large"
                    class="w-3/4 mb-4"
                />
                <div v-if="form.errors.position" class="error">
                    {{ form.errors.position }}
                </div>

                <!-- Organization -->
                <Select
                    v-if="
                        form.role == 'Student Officer' ||
                        (form.role == 'Admin' &&
                            form.position == 'College Dean')
                    "
                    v-model="form.organization_id"
                    :options="organizations"
                    optionValue="id"
                    optionLabel="name"
                    placeholder="Select your organization"
                    size="large"
                    class="w-3/4 mb-4"
                />
                <div v-if="form.errors.organization" class="error">
                    {{ form.errors.organization }}
                </div>

                <!-- First Name -->
                <InputText
                    type="text"
                    v-model="form.first_name"
                    placeholder="First Name"
                    size="large"
                    class="w-3/4 block mb-4"
                />
                <div v-if="form.errors.first_name" class="error">
                    {{ form.errors.first_name }}
                </div>

                <!-- Last Name -->
                <InputText
                    type="text"
                    v-model="form.last_name"
                    placeholder="Last Name"
                    size="large"
                    class="w-3/4 block mb-4"
                />
                <div v-if="form.errors.last_name" class="error">
                    {{ form.errors.last_name }}
                </div>

                <!-- Email -->
                <InputText
                    type="email"
                    v-model="form.email"
                    placeholder="Email"
                    size="large"
                    class="w-3/4 block mb-4"
                />
                <div v-if="form.errors.email" class="error">
                    {{ form.errors.email }}
                </div>

                <!-- Password -->
                <Password
                    v-model="form.password"
                    toggleMask
                    placeholder="Password"
                    size="large"
                    :inputStyle="{ width: '100%' }"
                    class="w-3/4 block mb-4"
                />
                <div v-if="form.errors.password" class="error">
                    {{ form.errors.password }}
                </div>

                <!-- Confirm Password -->
                <Password
                    v-model="form.password_confirmation"
                    toggleMask
                    placeholder="Confirm Password"
                    size="large"
                    :inputStyle="{ width: '100%' }"
                    class="w-3/4 block mb-4"
                />

                <!-- Register Button -->
                <Button
                    type="submit"
                    :disabled="form.processing"
                    label="REGISTER"
                    size="large"
                    class="block bg-white text-ua-blue hover:bg-ua-blue hover:text-white"
                />

                <p class="mt-8 text-white">
                    Already have an account?
                    <Link :href="route('login')" class="underline">Login</Link>
                </p>
            </form>
        </div>
    </div>
    <AuthLayout>
        <form
            @submit.prevent="onSubmit"
            class="w-[500px] rounded-xl bg-indigo-900 p-8 text-white"
        >
            <h1
                class="h1-shadow mb-4 text-center text-2xl font-bold uppercase tracking-widest text-white"
            >
                Registration
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
                Already have an account?
                <Link :href="route('register')" class="underline">Login</Link>
            </p>
        </form>
    </AuthLayout>
</template>

<style scoped>
.h1-shadow {
    text-shadow: 3px 2px black;
}
</style>
