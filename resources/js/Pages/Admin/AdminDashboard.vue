<script setup>
import MyCalendar from "../../components/global/MyCalendar.vue";

const props = defineProps({
    activityForms: Array,
});
</script>

<template>
    <div class="app flex pt-16">
        <UAHeader />
        <AdminSideMenu />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="main-content w-screen ml-64 p-5">
            <div class="flex justify-between items-center mt-5 mx-12 mb-4">
                <Account class="account" />

                <div class="flex justify-center items-center gap-5">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl" />
                </div>
            </div>

            <div class="h-0.5 bg-ua-blue mb-8"></div>

            <MyCalendar :activityForms="props.activityForms" />
        </div>
    </div>
</template>

<style scoped>
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
</style>
