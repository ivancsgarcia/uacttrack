<script setup>
import { ref, computed } from "vue";

const props = defineProps({
    form: Object,
    venues: Array,
});

const attrs = ref([
    { key: "today", highlight: true, dates: new Date() },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 7, 21),
        popover: {
            label: "Ninoy Aquino Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 7, 26),
        popover: {
            label: "National Heroes Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 10, 1),
        popover: {
            label: "All Saints' Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 10, 2),
        popover: {
            label: "All Souls' Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 10, 30),
        popover: {
            label: "Bonifacio Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 8),
        popover: {
            label: "Immaculate Conception of Mary",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 11),
        popover: {
            label: "Pampanga Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 25),
        popover: {
            label: "Christmas Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2024, 11, 30),
        popover: {
            label: "Rizal Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 0, 1),
        popover: {
            label: "New Year's Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 0, 29),
        popover: {
            label: "Chinese New Year's Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 1, 25),
        popover: {
            label: "Edsa Revolution",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 2, 30),
        popover: {
            label: "End of Ramadan (Eid'l Fitr) tentative",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 3, 9),
        popover: {
            label: "Araw ng Kagitingan",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: { start: new Date(2025, 3, 14), end: new Date(2025, 3, 18) },
        popover: {
            label: "Holy Week",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 4, 1),
        popover: {
            label: "Labor Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 4, 7),
        popover: {
            label: "Jose Abad Santos Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 4, 12),
        popover: {
            label: "Election Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 5, 6),
        popover: {
            label: "Feast of Sacrifice (Eid'l Adha) tentative",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 5, 12),
        popover: {
            label: "Independence Day",
        },
    },
    {
        highlight: {
            color: "green",
        },
        dates: new Date(2025, 5, 15),
        popover: {
            label: "Mt. Pinatubo Day",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2024, 8, 10), end: new Date(2024, 8, 14) },
        popover: {
            label: "1st Semester Preliminary Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2024, 9, 22), end: new Date(2024, 9, 26) },
        popover: {
            label: "1st Semester Midterm Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: [
            { start: new Date(2024, 11, 5), end: new Date(2024, 11, 7) },
            { start: new Date(2024, 11, 9), end: new Date(2024, 11, 10) },
        ],
        popover: {
            label: "1st Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: [
            { start: new Date(2024, 11, 5), end: new Date(2024, 11, 7) },
            { start: new Date(2024, 11, 9), end: new Date(2024, 11, 10) },
        ],
        popover: {
            label: "1st Semester Final Exams (Non-Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 1, 18), end: new Date(2025, 1, 22) },

        popover: {
            label: "2nd Semester Preliminary Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 3, 1), end: new Date(2025, 3, 5) },

        popover: {
            label: "2nd Semester Midterm Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 4, 20), end: new Date(2025, 4, 24) },

        popover: {
            label: "2nd Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 4, 15), end: new Date(2025, 4, 16) },

        popover: {
            label: "2nd Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 5, 30), end: new Date(2025, 5, 30) },

        popover: {
            label: "3rd Semester Midterm Exams",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 6, 18), end: new Date(2025, 6, 18) },

        popover: {
            label: "3rd Semester Final Exams (Graduating Students)",
        },
    },
    {
        highlight: {
            color: "purple",
        },
        dates: { start: new Date(2025, 6, 18), end: new Date(2025, 6, 18) },

        popover: {
            label: "3rd Semester Final Exams (Graduating Students)",
        },
    },
]);

const disabledDates = ref([
    {
        start: new Date(),
        end: new Date(new Date().setDate(new Date().getDate() + 7)),
    }, // cant make an APF 1week from today
    { start: new Date(2024, 8, 8), end: new Date(2024, 8, 15) },
    { start: new Date(2024, 9, 20), end: new Date(2024, 9, 27) },
    { start: new Date(2024, 11, 1), end: new Date(2024, 11, 11) },
    { start: new Date(2025, 1, 16), end: new Date(2025, 1, 23) },
    { start: new Date(2025, 2, 30), end: new Date(2025, 3, 6) },
    { start: new Date(2025, 4, 11), end: new Date(2025, 4, 25) },
    { start: new Date(2025, 5, 28), end: new Date(2025, 5, 30) },
    { start: new Date(2025, 6, 13), end: new Date(2025, 5, 18) },
    { start: new Date(2024, 11, 11), end: new Date(2025, 0, 8) }, // Christmas Break
    { start: new Date(2025, 4, 25), end: new Date(2025, 6, 8) }, // Summer Break
    { start: new Date(2024, 7, 21), end: new Date(2024, 7, 21) },
    { start: new Date(2024, 7, 26), end: new Date(2024, 7, 26) },
    { start: new Date(2024, 10, 1), end: new Date(2024, 10, 1) },
    { start: new Date(2024, 10, 2), end: new Date(2024, 10, 2) },
    { start: new Date(2024, 10, 30), end: new Date(2024, 10, 30) },
    { start: new Date(2024, 11, 8), end: new Date(2024, 11, 8) },
    { start: new Date(2024, 11, 11), end: new Date(2024, 11, 11) },
    { start: new Date(2024, 11, 25), end: new Date(2024, 11, 25) },
    { start: new Date(2024, 11, 30), end: new Date(2024, 11, 30) },
    { start: new Date(2025, 0, 1), end: new Date(2025, 0, 1) },
    { start: new Date(2025, 0, 29), end: new Date(2025, 0, 29) },
    { start: new Date(2025, 1, 25), end: new Date(2025, 1, 25) },
    { start: new Date(2025, 2, 30), end: new Date(2025, 2, 30) },
    { start: new Date(2025, 3, 9), end: new Date(2025, 3, 9) },
    { start: new Date(2025, 3, 14), end: new Date(2025, 3, 18) },
    { start: new Date(2025, 4, 1), end: new Date(2025, 4, 1) },
    { start: new Date(2025, 4, 7), end: new Date(2025, 4, 7) },
    { start: new Date(2025, 4, 12), end: new Date(2025, 4, 12) },
    { start: new Date(2025, 5, 6), end: new Date(2025, 5, 6) },
    { start: new Date(2025, 5, 12), end: new Date(2025, 5, 12) },
    { start: new Date(2025, 5, 15), end: new Date(2025, 5, 15) },
]);

const pickedVenues = ref([
    { id: 1, name: "Social Hall", capacity: 100 },
    { id: 2, name: "UA Conference Room", capacity: 100 },
    { id: 3, name: "Multi-Purpose Room", capacity: 300 },
    { id: 4, name: "UA Chapel", capacity: 500 },
    { id: 5, name: "Auditorium", capacity: 540 },
    { id: 6, name: "Covered Court 1", capacity: 800 },
    { id: 7, name: "Covered Court 2", capacity: 800 },
    { id: 8, name: "St. Thomas Aquinas Courtyard", capacity: 3000 },
    { id: 9, name: "Gymnasium", capacity: 4000 },
]);

const venueRecommendation = () => {
    if (props.form.attendance_count <= 0) {
        alert("Please enter a valid attendance count.");
        return;
    }

    const recommendedVenue = pickedVenues.value.find(
        (venue) => venue.capacity >= props.form.attendance_count
    );

    if (recommendedVenue) {
        props.form.venue = recommendedVenue.name;
    } else {
        alert("No venue available for the specified attendance count.");
    }
};
</script>

<template>
    <div class="py-4">
        <div class="flex gap-4">
            <div class="w-2/4 space-y-2">
                <div class="flex flex-col">
                    <label for="date" class="text-ua-blue text-2xl"
                        ><span class="text-red-400">*</span> Date</label
                    >
                    <VDatePicker
                        v-model="form.date"
                        :attributes="attrs"
                        :disabled-dates="disabledDates"
                        mode="date"
                    />
                    <!-- <input
                        type="date"
                        name="date"
                        v-model="form.date"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    /> -->
                </div>

                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl"
                        ><span class="text-red-400">*</span> From Time</label
                    >
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
                        ><span class="text-red-400">*</span> To Time</label
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
                    <label for="attendees" class="text-ua-blue text-2xl"
                        ><span class="text-red-400">*</span> Number of Attendees
                    </label>
                    <input
                        type="number"
                        id="attendees"
                        v-model="form.attendance_count"
                        min="0"
                        max="5000"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>

                <div class="flex flex-col">
                    <label for="event" class="text-ua-blue text-2xl"
                        ><span class="text-red-400">*</span> Type of Event
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
                <label for="" class="text-ua-blue text-2xl"
                    ><span class="text-red-400">*</span> Venue</label
                >
                <select
                    v-model="form.venue"
                    placeholder="Pick A Venue"
                    class="rounded-xl shadow bg-ua-blue/30 p-2 mb-4"
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
            </div>

            <div class="flex flex-col w-2/4">
                <label for="reqs" class="text-ua-blue text-2xl"
                    ><span class="text-red-400">*</span> Requirements /
                    Resources Needed
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
