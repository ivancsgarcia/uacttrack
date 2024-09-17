<template>
    <div class="part-two w-full" >
            <div class="flex justify-center gap-5">
                <div class="flex flex-col gap-10 w-2/4">
                    <div class="flex flex-col ">
                        <label for="date" class="text-ua-blue text-3xl">Date</label>
                        <input type="date" name="date" v-model="form.date" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                    <div class="flex flex-col">
                        <label for="from-time" class="text-ua-blue text-3xl">From Time</label>
                        <input type="time" name="from-time" v-model="form.fromTime" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                    <div class="flex flex-col">
                        <label for="to-time" class="text-ua-blue text-3xl">To Time</label>
                        <input type="time" name="to-time" v-model="form.toTime" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                </div>
                <div class="flex flex-col gap-10 w-2/4">
                    <div class="flex flex-col">
                        <label for="attendees" class="text-ua-blue text-3xl">Number of attendees</label>
                        <input type="number" name="attendees" v-model="form.numberOfAttendees" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                    <div class="flex flex-col">
                        <label for="event" class="text-ua-blue text-3xl">Type of Event</label>
                        <input type="text" name="event" v-model="form.typeOfEvent" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                </div>
            </div>

            <div class="h-0.5 bg-black my-10"></div>
            <div class="text-center bg-ua-blue text-white w-2/4 text-3xl p-4 mx-auto mb-5 rounded-md">Recommended Venue</div>

            <div class="flex justify-center gap-10 mb-10">
                <div class="flex flex-col w-2/4">
                    <label for="" class="text-ua-blue text-3xl">Available Venue (Recommended)</label>
                    <select name="vue" id="" v-model="form.availableVenue" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4">
                        <option value="">Pick a Venue</option>
                    </select>
                </div>
                <div class="flex flex-col w-2/4">
                    <label for="reqs" class="text-ua-blue text-3xl">Requirements / Resources Needed</label>
                    <textarea name="reqs" v-model="form.requirementsOrResourcesNeeded" class="border-2 rounded-md bg-ua-blue/30 h-40 text-2xl p-4"></textarea>
                </div>
            </div>

            <div class="flex justify-center items-center gap-5 mb-10">
                <button @click="emit('previousStep')" class="border border-black rounded-xl text-ua-blue text-2xl px-12 py-4">Back</button>
                <button @click="emit('nextStep')" class="border border-ua-blue rounded-xl bg-ua-blue text-white text-2xl px-12 py-4">Next</button>
            </div>

        </div>
</template>

<script setup>
    const props = defineProps({
        form: Object,
    })

    const emit = defineEmits(['nextStep', 'previousStep'])

</script>

<style scoped>

</style>