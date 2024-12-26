<script setup>
import HeaderLayout from "../../Layouts/HeaderLayout.vue";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import Select from "primevue/select";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import { useForm, router } from "@inertiajs/vue3";

defineOptions({ layout: HeaderLayout });

const props = defineProps({
    activity: Object,
    events: Array,
    venues: Array,
});

const form = useForm({
    check_payment_or_cash: props.activity.check_payment_or_cash,
    food: props.activity.food,
    supplies: props.activity.supplies,
    reproduction: props.activity.reproduction,
    others: props.activity.others,
    start_date: props.activity.start_date,
    end_date: props.activity.end_date,
    attendance_count: props.activity.attendance_count,
    event_type: props.activity.event_type,
    venue: props.activity.venue,
    requirements_or_resources_needed:
        props.activity.requirements_or_resources_needed,
    title: props.activity.title,
    description: props.activity.description,
    participant: props.activity.participant,
    payment_or_cash_file: props.activity.payment_or_cash_file,
    food_file: props.activity.food_file,
    supplies_file: props.activity.supplies_file,
    reproduction_file: props.activity.reproduction_file,
    others_file: props.activity.others_file,
    proponent: props.activity.proponent,
    security: props.activity.security,
    eamo: props.activity.eamo,
    janitorial: props.activity.janitorial,
    photoLab: props.activity.photoLab,
    sports: props.activity.sports,
    ppgs: props.activity.ppgs,
    hotel: props.activity.hotel,
    soundSystem: props.activity.soundSystem,
    others_specify: props.activity.others_specify,
    _method: "PUT",
});

const cancel = (activityId) => {
    router.get(route("activity-form.show", activityId));
};

const updateForm = (activityId) => {
    form.post(route("activity-form.update", activityId));
};
</script>

<template>
    <Head title=" | Activity Proposal Form" />
    <div class="w-5/6 m-auto">
        <form @submit.prevent="updateForm(activity.id)">
            <h1 class="text-3xl text-center my-8">Activity Proposal Form</h1>
            <p>
                (Approval Form for In-Campus Activities with corresponding
                Logistics and Funding Requirements)
            </p>
            <p class="mb-4">
                Note: Deadline of Submission of activity form is one week before
                the activity. Please ensure that the date in the activity form
                that you will generate is correct because it cannot be changed.
            </p>

            <div class="flex gap-4 mb-4">
                <div class="w-4/6 flex flex-col">
                    <label class="text-2xl">Activity Title</label>
                    <InputText v-model="form.title" />
                </div>

                <div class="w-2/6 flex flex-col">
                    <label class="text-2xl">Type of Event</label>
                    <Select
                        v-model="form.event_type"
                        :options="events"
                        editable
                    />
                </div>
            </div>

            <div class="flex flex-col mb-4">
                <label class="text-2xl">Activity Description</label>
                <Textarea
                    cols="30"
                    rows="4"
                    v-model="form.description"
                ></Textarea>
            </div>

            <div class="flex gap-4 mb-4">
                <div class="w-3/4 flex flex-col">
                    <label class="text-2xl"
                        >Participants - Department / Program / Grade or Year
                        Level</label
                    >
                    <Select v-model="form.participant" />
                </div>

                <div class="w-1/4 flex flex-col">
                    <label class="text-2xl">Expected Number of Attendees</label>
                    <InputNumber v-model="form.attendance_count" />
                </div>
            </div>

            <div class="flex gap-4 mb-4">
                <div class="w-1/2 flex flex-col">
                    <label class="text-2xl">Start Date/Time</label>
                    <InputText v-model="form.start_date" />
                </div>

                <div class="w-1/2 flex flex-col">
                    <label class="text-2xl">End Date/Time</label>
                    <InputText v-model="form.end_date" />
                </div>
            </div>

            <div class="flex flex-col mb-4">
                <label class="text-2xl">Venue</label>
                <Select
                    v-model="form.venue"
                    :options="venues.map((venue) => venue.name)"
                />
            </div>

            <div class="flex flex-col mb-4">
                <label class="text-2xl">Requirements / Resources Needed</label>
                <Textarea
                    cols="30"
                    rows="4"
                    v-model="form.requirements_or_resources_needed"
                ></Textarea>
            </div>

            <div class="p-2 bg-black/20 text-center text-2xl my-8">
                <h2>Projected Funding Needs</h2>
            </div>

            <div class="flex mb-4">
                <div class="w-2/4 text-center text-2xl">Nature</div>
                <div class="w-2/4 text-center text-2xl">Attached Files</div>
            </div>

            <div class="flex gap-4 mb-4 text-xl">
                <div
                    class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                >
                    Check Payment / Cash
                </div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">
                        Funding Request Form (FRF) for P1,000 and above or Petty
                        Cash Form (PCF ) for amount below P1,000.
                    </p>
                    <div class="flex justify-center">
                        <a
                            :href="`/storage/${form.payment_or_cash_file}`"
                            download
                            >Download Attached FRF or PCF</a
                        >
                    </div>
                </div>
            </div>

            <div class="flex mx-auto gap-4 mb-4 text-xl">
                <div
                    class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                >
                    Food
                </div>
                <div
                    class="bg-ua-blue/30 w-2/4 flex flex-col justify-center items-center p-2 rounded-md"
                >
                    <p class="text-center">Request for Meals (RFM)</p>
                    <div class="flex justify-center">
                        <a :href="`/storage/${form.food_file}`" download
                            >Download Attached RFM</a
                        >
                    </div>
                </div>
            </div>

            <div class="flex mx-auto gap-4 mb-4 text-xl">
                <div
                    class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                >
                    Supplies
                </div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">
                        Requisition Form (RF) for supplies available at RMS or
                        Purchase Requisition (PR) for supplies to be purchased
                    </p>
                    <div class="flex justify-center">
                        <a :href="`/storage/${form.supplies_file}`" download
                            >Download Attached RF or PR</a
                        >
                    </div>
                </div>
            </div>

            <div class="flex mx-auto gap-4 mb-4 text-xl">
                <div
                    class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                >
                    Reproduction
                </div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">Reproduction Form</p>
                    <div class="flex justify-center">
                        <a :href="`/storage/${form.reproduction_file}`" download
                            >Download Attached Reproduction Form</a
                        >
                    </div>
                </div>
            </div>

            <div class="flex gap-4 text-xl">
                <div
                    class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                >
                    Others, specify
                </div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">If applicable:</p>
                    <div class="flex justify-center">
                        <a :href="`/storage/${form.others_file}`" download
                            >Download Attached Reproduction Form</a
                        >
                    </div>
                </div>
            </div>

            <div class="vertical-line"></div>

            <div class="flex justify-center gap-8 mt-8 mb-12">
                <div>
                    <Button
                        @click="cancel(activity.id)"
                        label="Cancel"
                        severity="secondary"
                        class="px-12 py-4"
                    />
                </div>
                <div>
                    <!-- <Button
                        :disabled="form.processing"
                        label="Save"
                        severity="success"
                        class="px-12 py-4"
                    /> -->
                    <button :disabled="form.processing">Update</button>
                </div>
            </div>
        </form>
    </div>
</template>

<style scoped>
.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin: 2rem 0;
}
</style>
