<script setup>
import { ref, watch } from "vue";
import DatePicker from "../global/DatePicker.vue";

const props = defineProps({
    form: Object,
    venues: Array,
    participants: Array,
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
    <div class="w-1/2 py-8">
        <div class="flex gap-4 mb-4">
            <div class="w-1/3">
                <DatePicker v-model="date" />
            </div>

            <div class="w-3/4 flex flex-col justify-center gap-12">
                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl"
                        >Start Date/Time:</label
                    >
                    <InputText
                        type="text"
                        v-model="form.start_date"
                        disabled
                        class="shadow-md"
                    />
                </div>
                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl">End Date/Time:</label>
                    <InputText
                        type="text"
                        v-model="form.end_date"
                        disabled
                        class="shadow-md"
                    />
                </div>
            </div>
        </div>

        <div class="flex flex-col mb-4">
            <label class="text-ua-blue text-2xl"
                >Participants - Department / Program / Grade / Year Level</label
            >
            <Select
                v-model="form.participant"
                :options="participants"
                editable
                placeholder="Type or Select Participants"
                class="shadow-md"
            />
            <span v-if="form.errors.participant" class="text-red-500">
                * {{ form.errors.participant }}
            </span>
        </div>

        <div class="flex flex-col mb-12">
            <label class="text-ua-blue text-2xl">Number of Attendees</label>
            <InputNumber v-model="form.attendance_count" showButtons :min="1" :max="5000" class="shadow-md" />
            <span v-if="form.errors.attendance_count" class="text-red-500">
                {{ form.errors.attendance_count }}
            </span>
        </div>

        <div class="flex justify-center">
            <Button raised size="large" label="Recommend a Venue" class="text-2xl" />
        </div>

        <div class="flex flex-col">
            <label for="venue" class="text-ua-blue text-2xl">Venue</label>
            <Select
                v-model="form.venue"
                placeholder="Select a venue"
                :options="venues.map((venue) => venue.name)"
                class="shadow-md"
            />
            <span v-if="form.errors.venue" class="text-red-500">
                {{ form.errors.venue }}
            </span>
        </div>
    </div>
</template>
