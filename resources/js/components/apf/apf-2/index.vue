<script setup>
import APFHeader from '../APFHeader.vue';
import { ref } from 'vue';
import { onClickOutside } from '@vueuse/core';

const isModalOpen = ref(false);
const modal = ref(null);

onClickOutside(modal, () => (isModalOpen.value = false));
</script>

<template>
    <APFHeader title="Venue Booking" class="" />
    <Form class="pt-32">
        <div class="flex justify-center gap-20 flex-wrap">
            <div class="flex flex-col gap-10">
                <div class="flex flex-col">
                    <label for="date" class="text-ua-blue text-lg">Date</label>
                    <input type="date" name="date" class="border-2 rounded-md bg-ua-blue/30 w-72 h-12 p-2" />
                </div>
                <div class="flex flex-col">
                    <label for="from-time" class="text-ua-blue text-lg">From Time</label>
                    <input type="time" name="from-time" class="border-2 rounded-md bg-ua-blue/30 w-72 h-12 p-2" />
                </div>
                <div class="flex flex-col">
                    <label for="to-time" class="text-ua-blue text-lg">To Time</label>
                    <input type="time" name="to-time" class="border-2 rounded-md bg-ua-blue/30 w-72 h-12 p-2" />
                </div>
            </div>
            <div class="flex flex-col gap-10">
                <div class="flex flex-col">
                    <label for="attendees" class="text-ua-blue text-lg">Number of attendees</label>
                    <input type="number" name="attendees" class="border-2 rounded-md bg-ua-blue/30 w-72 h-12 p-2" />
                </div>
                <div class="flex flex-col">
                    <label for="event" class="text-ua-blue text-lg">Type of Event</label>
                    <input type="text" name="event" class="border-2 rounded-md bg-ua-blue/30 w-72 h-12 p-2" />
                </div>
            </div>
        </div>

        <div class="h-0.5 w-auto bg-black mt-20 mb-5"></div>
        <div class="text-center mb-10 bg-ua-blue text-white w-64 p-4 m-auto rounded-md">Recommended Venue</div>

        <div class="flex justify-center gap-20 flex-wrap">
            <div class="flex flex-col">
                <label for="" class="text-ua-blue text-lg">Available Venue (Recommended)</label>
                <select name="vue" id="" class="border-2 rounded-md bg-ua-blue/30 w-72 h-12 p-2">
                    <option value="">Pick a Venue</option>
                </select>
            </div>
            <div class="flex flex-col">
                <label for="reqs" class="text-ua-blue text-lg">Requirements / Resources Needed</label>
                <textarea name="reqs" class="border-2 rounded-md bg-ua-blue/30 w-72 p-2"></textarea>
            </div>
        </div>
        <router-link>
            <div class="bg-ua-blue text-white rounded-md w-32 mx-auto text-center py-4 my-10">Next</div>
        </router-link>

    </Form>
</template>

<style scoped>

</style>