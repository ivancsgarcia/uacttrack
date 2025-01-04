<script setup>
import InputText from "primevue/inputtext";
import Select from "primevue/select";
import Textarea from "primevue/textarea";

const props = defineProps({
    form: Object,
    events: Array,
    venues: Array,
    participants: Array,
});

const handleFileUpload = (event, fieldName) => {
    const file = event.target.files[0];
    if (file) {
        props.form[fieldName] = file;
    }
};
</script>

<template>
    <div class="w-3/4 p-4">
        <h1 class="text-ua-blue text-3xl text-center mb-8">
            Activity Proposal Form
        </h1>
        <p class="m-auto text-ua-blue text-md">
            (Approval Form for In-Campus Activities with corresponding Logistics
            and Funding Requirements)
        </p>
        <p class="m-auto text-ua-blue text-md mb-4">
            Note: Deadline of Submission of activity form is one week before the
            activity. Please ensure that the date in the activity form that you
            will generate is correct because
            <span class="font-bold">it cannot be changed.</span>
        </p>

        <div class="flex flex-col mb-4">
            <label class="text-ua-blue text-2xl">Activity Title</label>
            <InputText v-model="form.title" disabled class="shadow-md" />
            <span v-if="form.errors.title" class="text-red-500">
                * {{ form.errors.title }}
            </span>
        </div>

        <div class="flex flex-row gap-4 mb-4">
            <div class="flex flex-col w-2/4">
                <label class="text-ua-blue text-2xl">Type of Event</label>
                <Select
                    v-model="form.event_type"
                    editable
                    :options="events"
                    disabled
                    class="shadow-md"
                />
                <span v-if="form.errors.event_type" class="text-red-500">
                    * {{ form.errors.event_type }}
                </span>
            </div>
            <div class="flex flex-col w-2/4">
                <label class="text-ua-blue text-2xl"
                    >Activity Description</label
                >
                <Textarea
                    v-model="form.description"
                    disabled
                    rows="5"
                    cols="30"
                    class="shadow-md"
                />
                <span v-if="form.errors.description" class="text-red-500">
                    * {{ form.errors.description }}
                </span>
            </div>
        </div>

        <div class="w-auto flex gap-4 mb-4">
            <div class="flex flex-col w-1/2">
                <label class="text-ua-blue text-2xl">Start Date/Time:</label>
                <InputText
                    type="text"
                    v-model="form.start_date"
                    disabled
                    class="shadow-md"
                />
            </div>
            <div class="flex flex-col w-1/2">
                <label class="text-ua-blue text-2xl">End Date/Time:</label>
                <InputText
                    type="text"
                    v-model="form.end_date"
                    disabled
                    class="shadow-md"
                />
            </div>
        </div>

        <div class="flex flex-col mx-auto mb-4">
            <label class="text-ua-blue text-2xl">Venue</label>
            <Select
                v-model="form.venue"
                editable
                :options="venues"
                disabled
                class="shadow-md"
            />
            <span v-if="form.errors.venue" class="text-red-500">
                * {{ form.errors.venue }}
            </span>
        </div>

        <div class="flex gap-4">
            <div class="flex flex-col w-2/4">
                <label class="text-ua-blue text-2xl"
                    >Requirements / Resources Needed</label
                >
                <Textarea
                    v-model="form.requirements_or_resources_needed"
                    disabled
                    rows="5"
                    cols="30"
                    class="shadow-md"
                />
                <span
                    v-if="form.errors.requirements_or_resources_needed"
                    class="text-red-500"
                >
                    * {{ form.errors.requirements_or_resources_needed }}
                </span>
            </div>
            <div class="w-2/4">
                <div class="flex flex-col mb-4">
                    <label class="text-ua-blue text-2xl"
                        >Participants - Department / Program / Grade or Year
                        Level</label
                    >
                    <Select
                        v-model="form.participant"
                        :options="participants"
                        disabled
                        class="shadow-md"
                    />
                    <span v-if="form.errors.participant" class="text-red-500">
                        * {{ form.errors.participant }}
                    </span>
                </div>
                <div class="flex flex-col">
                    <label class="text-ua-blue text-2xl"
                        >Expected Number of Attendees</label
                    >
                    <InputNumber
                        v-model="form.attendance_count"
                        disabled
                        class="shadow-md"
                    />
                    <span
                        v-if="form.errors.attendance_count"
                        class="text-red-500"
                    >
                        * {{ form.errors.attendance_count }}
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-black/20 text-ua-blue p-4 text-center text-2xl my-8">
            Projected Funding Needs
        </div>
    </div>
</template>
