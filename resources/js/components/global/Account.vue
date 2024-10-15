<script setup>
import { computed } from 'vue'
import { usePage } from '@inertiajs/vue3'

const page = usePage()
const user = computed(() => page.props.auth.user)
const orgLogo = computed(() => page.props.organization.logo)
</script>

<template>
    <div class="flex w-full">
        <div class="round-avatar">
            <img :src="orgLogo" alt="organization-logo" class="rounded-full">
        </div>
        <div class="flex text">
            <p>Welcome,</p>
            <p class="name">{{ user.first_name + ' ' + user.last_name}}</p>
        </div>
    </div>
</template>

<style scoped>
    .flex {
        display: flex;
    }

    .round-avatar {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        background-color: gray;
        margin-right: 1rem;
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