<template>
    <div class="flex">
        <div class="round-avatar flex">
            <!-- ../../../../public/storage/organization_logos/AAA.jpg -->
            <img src="" alt="organization-logo">
        </div>
        <div class="flex text">
            <p>Welcome,</p>
            <p class="name">First Name</p>
        </div>
    </div>
</template>

<script setup>

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