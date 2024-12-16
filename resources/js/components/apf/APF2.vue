<script setup>
import { ref, watch } from "vue";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import Select from "primevue/select";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import DatePicker from "../global/DatePicker.vue";

const props = defineProps({
    form: Object,
    events: Array,
    venues: Array,
    approvedForms: Object,
});
const emit = defineEmits(["updateForm"]);

const date = ref("");

watch(date, (newDate) => {
    if (Array.isArray(newDate) && newDate.length === 2) {
        emit("updateForm", {
            start_date: new Date(newDate[0])
                .toISOString()
                .slice(0, 19)
                .replace("T", " "),
            end_date: new Date(newDate[1])
                .toISOString()
                .slice(0, 19)
                .replace("T", " "),
        });
    } else {
        emit("updateForm", { start_date: "", end_date: "" });
    }
});
</script>

<template>
    <div class="w-3/4 py-4">
        <div class="flex gap-4">
            <div class="w-2/4 space-y-2">
                <!-- Date Picker Component -->
                <DatePicker v-model="date" />
                <div class="flex flex-col">
                    <label>Start Date:</label>
                    <InputText type="text" v-model="form.start_date" />
                </div>
                <div class="flex flex-col">
                    <label>End Date:</label>
                    <InputText type="text" v-model="form.end_date" />
                </div>
            </div>

            <!-- Right side fields (Attendees, Event Type, etc.) -->
            <div class="w-2/4 space-y-2">
                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl"
                        >Number of Attendees</label
                    >
                    <InputNumber v-model="form.attendance_count" />
                    <span
                        v-if="form.errors.attendance_count"
                        class="text-red-500"
                    >
                        {{ form.errors.attendance_count }}
                    </span>
                </div>

                <div class="flex flex-col">
                    <label for="event" class="text-ua-blue text-2xl"
                        >Type of Event</label
                    >
                    <Select
                        v-model="form.event_type"
                        editable
                        :options="events"
                        placeholder="Select an Event"
                    />
                </div>
            </div>
        </div>

        <!-- Venue Recommendation Button -->
        <div class="flex justify-center mb-4">
            <Button label="Recommend a Venue" />
        </div>

        <!-- Venue and Requirements fields -->
        <div class="flex gap-4">
            <div class="flex flex-col w-2/4">
                <label for="venue" class="text-ua-blue text-2xl">Venue</label>
                <Select
                    v-model="form.venue"
                    :options="venues.map((venue) => venue.name)"
                    placeholder="Select a venue"
                />
                <span v-if="form.errors.venue" class="text-red-500">
                    {{ form.errors.venue }}
                </span>
            </div>

            <div class="flex flex-col w-2/4">
                <label for="reqs" class="text-ua-blue text-2xl"
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
