<template>
    <div class="flex">
        <div class="round-avatar flex">
            <img :src="organizations" alt="organization-logo">
        </div>
        <div class="flex text">
            <p>Welcome,</p>
            <p class="name">{{ auth.user.firstName }} {{ auth.user.lastName }}</p>
        </div>
    </div>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';

const page = usePage();
const auth = page.props.auth;
const organizations = page.props.organizations;

</script>

<style scoped>
    .flex {
        display: flex;
    }

    .round-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: gray;
    }

    .text {
        flex-direction: column;
        align-items: start;
        justify-content: center;
    }

    .text p {
        font-size: 1.8rem;
    }

    .name {
        font-weight: bold;
    }
</style>