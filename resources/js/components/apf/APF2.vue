<script setup>
import { ref, computed } from "vue";
import MyDatePicker from "../global/MyDatePicker.vue";

const props = defineProps({
    form: Object,
    venues: Array,
    approvedForms: Object,
});

const venueRecommendation = () => {
    if (!props.form.attendance_count || props.form.attendance_count <= 0) {
        props.form.errors.attendance_count =
            "Please enter a valid attendance count.";
        return;
    }

    const recommendedVenue = props.venues.find(
        (venue) => venue.capacity >= props.form.attendance_count
    );

    if (recommendedVenue) {
        props.form.venue = recommendedVenue.name;
    }
};
</script>

<template>
    <div class="py-4">
        <div class="flex gap-4">
            <div class="w-2/4 space-y-2">
                <div class="flex flex-col">
                    <label for="date" class="text-ua-blue text-2xl"
                        >* Date</label
                    >
                    <MyDatePicker :form="form" />
                    <!-- <input
                        type="date"
                        name="date"
                        v-model="form.date"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    /> -->
                </div>

                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl">* From Time</label>
                    <VDatePicker
                        v-model="form.from_time"
                        mode="time"
                        hide-time-header
                    />
                    <!-- <input
                        type="time"
                        v-model="form.from_time"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    /> -->
                </div>

                <div class="flex flex-col">
                    <label for="to-time" class="text-ua-blue text-2xl"
                        >* To Time</label
                    >
                    <VDatePicker
                        v-model="form.to_time"
                        mode="time"
                        hide-time-header
                    />
                    <!-- <input
                        type="time"
                        name="to-time"
                        v-model="form.to_time"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    /> -->
                </div>
            </div>
            <div class="w-2/4 space-y-2">
                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl"
                        >* Number of Attendees
                    </label>
                    <input
                        type="number"
                        v-model="form.attendance_count"
                        min="0"
                        max="5000"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                    <span
                        v-if="form.errors.attendance_count"
                        class="text-red-500"
                    >
                        {{ form.errors.attendance_count }}
                    </span>
                </div>

                <div class="flex flex-col">
                    <label for="event" class="text-ua-blue text-2xl"
                        >* Type of Event
                    </label>
                    <input
                        type="text"
                        id="event"
                        v-model="form.event_type"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>
            </div>
        </div>

        <div class="h-0.5 bg-black my-10"></div>

        <div class="flex justify-center mb-4">
            <button
                @click="venueRecommendation"
                class="text-center bg-ua-blue text-white text-xl rounded-xl shadow py-2 px-4 hover:bg-ua-blue/80"
            >
                Recommend a Venue
            </button>
        </div>

        <div class="flex gap-4">
            <div class="flex flex-col w-2/4">
                <label for="" class="text-ua-blue text-2xl">* Venue</label>
                <select
                    v-model="form.venue"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                >
                    <option value="" selected disabled>Pick A Venue</option>
                    <option
                        v-for="venue in venues"
                        :key="venue.id"
                        :value="venue.name"
                    >
                        {{ venue.name }}
                    </option>
                </select>
                <span v-if="form.errors.venue" class="text-red-500">
                    {{ form.errors.venue }}
                </span>
            </div>

            <div class="flex flex-col w-2/4">
                <label for="reqs" class="text-ua-blue text-2xl"
                    >* Requirements / Resources Needed
                </label>
                <textarea
                    name="reqs"
                    id="reqs"
                    v-model="form.requirements_or_resources_needed"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                ></textarea>
            </div>
        </div>
    </div>
</template>
