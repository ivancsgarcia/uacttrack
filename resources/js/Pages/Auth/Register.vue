<script setup>
import { useForm } from "@inertiajs/vue3";
import { watch } from "vue";

defineProps({
    organizations: Array,
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

const organization_positions = [
    "President",
    "Vice President",
    "Secretary",
    "Representative",
];

const admin_positions = [
    "College Dean",
    "Vice President for Academic Affairs",
    "Office of Student Affairs",
    "Vice President for Administration",
];
</script>

<template>
    <Head title="| Register" />
    <!-- Background Image -->
    <div class="bg-img">
        <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
    </div>

    <!-- Header -->
    <UAHeader />

    <!-- Sidebar -->
    <SystemSideMenu />

    <!-- Content -->
    <div class="main-content">
        <div class="account-section">
            <Account />
        </div>

        <div class="vertical-line"></div>

        <div class="flex">
            <div class="w-1/2">
                <img
                    :src="'images/sys-logos/UActTrack-no-logo.png'"
                    alt="uacttrack-logo"
                    class="w-3/4 m-auto"
                />

                <form @submit.prevent="submit">
                    <h1>Registration</h1>

                    <!-- Register As -->
                    <div class="text-box">
                        <select v-model="form.role">
                            <option value="" selected disabled>
                                Register As
                            </option>
                            <option value="Admin">Admin</option>
                            <option value="Student Officer">
                                Student Officer
                            </option>
                        </select>
                        <font-awesome-icon
                            :icon="['fas', 'angle-down']"
                            size="2xl"
                            class="dropdown-icon"
                        />
                    </div>
                    <div v-if="form.errors.role" class="error">
                        {{ form.errors.role }}
                    </div>

                    <!-- Student Officer Position -->
                    <div v-if="form.role == 'Student Officer'" class="text-box">
                        <select v-model="form.position">
                            <option value="" selected disabled>
                                Select Your Position
                            </option>
                            <option
                                v-for="orgPos in organization_positions"
                                :value="orgPos"
                            >
                                {{ orgPos }}
                            </option>
                        </select>
                        <font-awesome-icon
                            :icon="['fas', 'angle-down']"
                            size="2xl"
                            class="dropdown-icon"
                        />
                    </div>
                    <div v-if="form.errors.position" class="error">
                        {{ form.errors.role }}
                    </div>

                    <!-- Admin Position -->
                    <div v-if="form.role == 'Admin'" class="text-box">
                        <select v-model="form.position">
                            <option value="" selected disabled>
                                Select Your Position
                            </option>
                            <option
                                v-for="adPos in admin_positions"
                                :value="adPos"
                            >
                                {{ adPos }}
                            </option>
                        </select>
                        <font-awesome-icon
                            :icon="['fas', 'angle-down']"
                            size="2xl"
                            class="dropdown-icon"
                        />
                    </div>
                    <div v-if="form.errors.position" class="error">
                        {{ form.errors.position }}
                    </div>

                    <!-- Organization -->
                    <div
                        v-if="
                            form.role == 'Student Officer' ||
                            (form.role == 'Admin' &&
                                form.position == 'College Dean')
                        "
                        class="text-box"
                    >
                        <select v-model="form.organization_id">
                            <option value="" selected disabled>
                                Select An Organization
                            </option>
                            <option
                                v-for="org in organizations"
                                :key="org.id"
                                :value="org.id"
                            >
                                {{ org.name }}
                            </option>
                        </select>
                        <font-awesome-icon
                            :icon="['fas', 'angle-down']"
                            size="2xl"
                            class="dropdown-icon"
                        />
                    </div>
                    <div v-if="form.errors.organization" class="error">
                        {{ form.errors.organization }}
                    </div>

                    <!-- First Name -->
                    <div class="text-box">
                        <input
                            type="text"
                            v-model="form.first_name"
                            placeholder="First Name"
                        />
                    </div>
                    <div v-if="form.errors.first_name" class="error">
                        {{ form.errors.first_name }}
                    </div>

                    <!-- Last Name -->
                    <div class="text-box">
                        <input
                            type="text"
                            v-model="form.last_name"
                            placeholder="Last Name"
                        />
                    </div>
                    <div v-if="form.errors.last_name" class="error">
                        {{ form.errors.last_name }}
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
                        Register
                    </button>
                </form>
            </div>
            <div class="w-1/2"></div>
        </div>
    </div>
</template>

<style scoped>
.main-content {
    margin-left: 16rem;
    padding: 1rem;
}

.account-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem;
}

.icons-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
}

.icon:hover {
    cursor: pointer;
    color: gold;
}

.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
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
    filter: grayscale(100%);
    opacity: 0.1;
}

form {
    background-color: #272f5c;
    border-radius: 2rem;
    padding: 2rem 0;
    box-shadow: 8px 8px 15px gray;
    margin-top: 2rem;
}

h1 {
    color: white;
    font-size: 2rem;
    text-transform: uppercase;
    text-shadow: 3px 2px black;
    margin-bottom: 0.5rem;
    letter-spacing: 0.1rem;
    text-align: center;
}

.text-box {
    margin: auto;
    display: flex;
    width: 80%;
    background-color: #fff;
    border-radius: 1.5rem;
    margin-top: 1.2rem;
    box-shadow: 1px 3px 4px black;
    position: relative;
}

select {
    border-radius: 1.5rem;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 1.5rem;
    color: #272f5c;
    appearance: none;
    background-color: transparent;
    border: none;
    z-index: 1;
}

.dropdown-icon {
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translateY(-50%);
    pointer-events: none;
    z-index: 0;
}

input {
    border-radius: 1.5rem;
    width: 100%;
    padding: 0.5rem 1rem;
    font-size: 1.5rem;
    color: #272f5c;
}

select:focus,
input:focus {
    outline: none;
}

.error {
    color: #ef4444;
    width: 100%;
}

.register-btn {
    background-color: white;
    display: block;
    color: #272f5c;
    border-radius: 1.2rem;
    padding: 0.5rem 2rem;
    text-transform: uppercase;
    margin: 2rem auto 0;
    font-size: 1.5rem;
    letter-spacing: 0.1rem;
    font-weight: bold;
}

.register-btn:hover {
    background-color: #6375bf;
    color: white;
}
</style>
