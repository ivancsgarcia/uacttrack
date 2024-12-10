<script setup>
import { ref } from "vue";
import { attrs, disabledDates } from "../apf/dateAttributes";

// Props received from parent
const props = defineProps({
    form: Object,
    venues: Array,
    approvedForms: Object,
});

const masks = ref({
  modelValue: 'YYYY-MM-DD',
});
</script>

<template>
    <div class="py-4">
        <div class="flex gap-4">
            <div class="w-2/4 space-y-2">
                <!-- Date Picker Component -->
                <div class="flex flex-col">
                    <label for="date" class="text-ua-blue text-2xl"
                        >* Date</label
                    >
                    <VDatePicker
                        v-model="form.date"
                        :attributes="attrs"
                        :disabled-dates="disabledDates"
                        :masks="masks"
                        mode="date"
                        expanded
                    />
                </div>

                <!-- Additional Fields (From Time, To Time) -->
                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl">* From Time</label>
                    <VDatePicker
                        v-model="form.from_time"
                        mode="time"
                        hide-time-header
                    />
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
                </div>
            </div>

            <!-- Right side fields (Attendees, Event Type, etc.) -->
            <div class="w-2/4 space-y-2">
                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl"
                        >* Number of Attendees</label
                    >
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
                        >* Type of Event</label
                    >
                    <input
                        type="text"
                        id="event"
                        v-model="form.event_type"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>
            </div>
        </div>

        <!-- Venue Recommendation Button -->
        <div class="flex justify-center mb-4">
            <button
                @click="venueRecommendation"
                class="text-center bg-ua-blue text-white text-xl rounded-xl shadow py-2 px-4 hover:bg-ua-blue/80"
            >
                Recommend a Venue
            </button>
        </div>

        <!-- Venue and Requirements fields -->
        <div class="flex gap-4">
            <div class="flex flex-col w-2/4">
                <label for="venue" class="text-ua-blue text-2xl">* Venue</label>
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
                    >* Requirements / Resources Needed</label
                >
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
