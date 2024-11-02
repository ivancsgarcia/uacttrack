<script setup>
import DatePicker from "primevue/datepicker";
import { ref } from "vue";

const props = defineProps({
    form: Object,
    venues: Array,
});
</script>

<template>
    <div class="p-4">
        <div class="flex">
            <div class="">
                <div class="flex flex-col">
                    <label for="date" class="text-ua-blue text-3xl">Date</label>
                    <!-- <input
                        type="date"
                        name="date"
                        v-model="form.date"
                        class="border-2 rounded-md bg-ua-blue/30 text-2xl p-4"
                    /> -->
                    <InputText id="date" type="date" v-model="form.date" />
                </div>

                <div class="flex flex-col">
                    <label for="from-time" class="text-ua-blue text-3xl"
                        >From Time</label
                    >
                    <!-- <input
                        type="time"
                        name="from-time"
                        v-model="form.from_time"
                        class="border-2 rounded-md bg-ua-blue/30 text-2xl p-4"
                    /> -->
                    <InputText id="from-time" type="time" v-model="form.from_time" />
                </div>

                <div class="flex flex-col">
                    <label for="to-time" class="text-ua-blue text-3xl"
                        >To Time</label
                    >
                    <!-- <input
                        type="time"
                        name="to-time"
                        v-model="form.to_time"
                        class="border-2 rounded-md bg-ua-blue/30 text-2xl p-4"
                    /> -->
                    <InputText id="to-time" type="time" v-model="form.to_time" />
                </div>

            </div>
            <div class="">
                <div>
                    <label for="attendees">Number Of Attendees</label>
                    <InputNumber
                        inputId="attendees"
                        v-model="form.attendance_count"
                        :min="0"
                        :max="10000"
                        showButtons
                    />
                </div>

                <div>
                    <label for="event">Type Of Event</label>
                    <InputText id="event" v-model="form.event_type" />
                </div>
            </div>
        </div>

        <div class="h-0.5 bg-black my-10"></div>

        <div class="flex">
            <div class="flex flex-col">
                <label for="" class="text-ua-blue text-3xl"
                    >Available Venue (Recommended)</label
                >
                <Select
                    v-model="form.venue"
                    :options="venues"
                    optionLabel="name"
                    optionValue="name"
                    placeholder="Pick A Venue"
                />

                <div
                    class="text-center bg-ua-blue text-white text-3xl rounded-md"
                >
                    Recommended Venue
                </div>
            </div>
            <div class="flex flex-col">
                <label for="reqs" class="text-ua-blue text-3xl"
                    >Requirements / Resources Needed</label
                >
                <Textarea
                    v-model="form.requirements_or_resources_needed"
                    rows="5"
                    cols="30"
                />
            </div>
        </div>
    </div>
</template>

<style scoped></style>
