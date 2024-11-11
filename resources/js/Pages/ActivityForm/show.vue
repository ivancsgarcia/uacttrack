<script setup>
const props = defineProps({
    activityForms: Object,
    logoPath: String,
    venues: Array,
});

const downloadPDF = (activityId) => {
    const url = `/activity-form-pdf/${activityId}`;
    window.open(url, "_blank");
};
</script>

<template>
    <!-- Background Image -->
    <div class="bg-img">
        <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
    </div>

    <!-- Header -->
    <UAHeader />

    <!-- Content -->
    <div class="main-content">
        <div class="">
            <h1 class="text-3xl text-center mb-8">Activity Proposal Form</h1>
            <p class="m-auto text-md">
                (Approval Form for In-Campus Activities with corresponding
                Logistics and Funding Requirements)
            </p>
            <p class="m-auto text-md mb-4">
                Note: Deadline of Submission of activity form is three days
                before the activity. Please ensure that the date in the activity
                form that you will generate is correct because it cannot be
                changed.
            </p>

            <div class="flex flex-col mb-4">
                <label class="text-2xl">Activity Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    v-model="activityForms.title"
                    disabled
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                />
            </div>

            <div class="flex mb-4 gap-4">
                <div class="flex flex-col w-2/4">
                    <label class="text-2xl">Type of Event</label>
                    <input
                        type="text"
                        name="event"
                        id="event"
                        v-model="activityForms.event_type"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>

                <div class="flex flex-col w-2/4">
                    <label class="text-2xl">Activity Description</label>
                    <textarea
                        cols="30"
                        v-model="activityForms.title"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    ></textarea>
                </div>
            </div>

            <div class="flex mb-4 gap-4">
                <div class="w-2/4 flex flex-col">
                    <label class="text-2xl">Date</label>
                    <input
                        type="date"
                        v-model="activityForms.date"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>

                <div class="w-1/4 flex flex-col">
                    <label class="text-2xl">From Time</label>
                    <input
                        type="time"
                        v-model="activityForms.from_time"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>

                <div class="w-1/4 flex flex-col">
                    <label class="text-2xl">To Time</label>
                    <input
                        type="time"
                        v-model="activityForms.to_time"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>
            </div>

            <div class="flex flex-col mb-4">
                <label class="text-2xl">Venue</label>
                <select
                    v-model="activityForms.venue"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                >
                    <option
                        v-for="venue in venues"
                        :key="venue.id"
                        :value="venue.name"
                    ></option>
                </select>
            </div>

            <div class="flex gap-4">
                <div class="flex flex-col w-2/4">
                    <label class="text-2xl"
                        >Requirements / Resources Needed</label
                    >
                    <textarea
                        cols="30"
                        rows="8"
                        v-model="activityForms.requirements_or_resources_needed"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    ></textarea>
                </div>

                <div class="flex flex-col w-2/4">
                    <div class="flex flex-col mb-4">
                        <label class="text-2xl"
                            >Participants - Department / Program / Grade or Year
                            Level</label
                        >
                        <textarea
                            cols="30"
                            rows="4"
                            v-model="activityForms.participant"
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        ></textarea>
                    </div>

                    <div class="flex flex-col">
                        <label class="text-2xl"
                            >Expected Number of Attendees</label
                        >
                        <input
                            type="number"
                            v-model="activityForms.attendance_count"
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        />
                    </div>
                </div>
            </div>
        </div>

        <div class="">
            <div class="p-2 bg-black/20 text-center text-2xl my-8">
                <h2>Projected Funding Needs</h2>
            </div>
            <div class="flex justify-center gap-8">
                <div>
                    <button class="bg-red-300 rounded-md px-8 py-2">
                        Cancel
                    </button>
                </div>
                <div>
                    <button
                        :href="route('activity-form.edit', activityForms.id)"
                        class="bg-yellow-300 rounded-md px-8 py-2"
                    >
                        Edit
                    </button>
                </div>
                <div v-if="activityForms.status === 'APPROVED'">
                    <button @click="downloadPDF(activityForms.id)">
                        Download PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.app {
    padding-top: 4rem;
    width: 100%;
}

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

.main-content {
    padding: 1rem;
}

.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin: 2rem 0;
}
</style>
