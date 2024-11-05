<script setup>
const props = defineProps({
    form: Object,
    venues: Array,
});
</script>

<template>
    <div class="py-4">
        <div class="flex gap-4">
            <div class="w-2/4 space-y-2">
                <div class="flex flex-col">
                    <label for="date" class="text-ua-blue text-2xl">Date</label>
                    <input
                        type="date"
                        name="date"
                        v-model="form.date"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>

                <div class="flex flex-col">
                    <label for="from-time" class="text-ua-blue text-2xl"
                        >From Time</label
                    >
                    <input
                        type="time"
                        name="from-time"
                        v-model="form.from_time"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>

                <div class="flex flex-col">
                    <label for="to-time" class="text-ua-blue text-2xl"
                        >To Time</label
                    >
                    <input
                        type="time"
                        name="to-time"
                        v-model="form.to_time"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>
            </div>
            <div class="w-2/4 space-y-2">
                <div class="flex flex-col">
                    <label for="attendees" class="text-ua-blue text-2xl"
                        >Number of Attendees</label
                    >
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
                        >Type of Event</label
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

        <div class="h-0.5 bg-black my-10"></div>

        <div class="flex gap-4">
            <div class="flex flex-col w-2/4">
                <label for="" class="text-ua-blue text-2xl"
                    >Available Venue (Recommended)</label
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

                <button
                    class="text-center bg-ua-blue text-white text-xl rounded-xl shadow p-2"
                >
                    Recommended Venue
                </button>
            </div>

            <div class="flex flex-col w-2/4">
                <label for="reqs" class="text-ua-blue text-2xl"
                    >Requirements / Resources Needed</label
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
