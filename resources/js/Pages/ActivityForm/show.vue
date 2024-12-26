<script setup>
import HeaderLayout from "../../Layouts/HeaderLayout.vue";
import InputText from "primevue/inputtext";
import InputNumber from "primevue/inputnumber";
import Select from "primevue/select";
import Textarea from "primevue/textarea";
import Button from "primevue/button";
import { router, Link } from "@inertiajs/vue3";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

defineOptions({ layout: HeaderLayout });

defineProps({
    activity: Object,
    events: Array,
    venues: Object,
});

const confirm = useConfirm();
const toast = useToast();

const editActivityForm = (activityId) => {
    router.get(route("activity-form.edit", activityId));
};

const deleteActivityForm = (activityId) => {
    confirm.require({
        message: "Do you want to delete this Activity Form?",
        header: "Danger Zone",
        icon: "pi pi-info-circle",
        rejectLabel: "Cancel",
        rejectProps: {
            label: "Cancel",
            severity: "secondary",
            outlined: true,
        },
        acceptProps: {
            label: "Delete",
            severity: "danger",
        },
        accept: () => {
            toast.add({
                severity: "info",
                summary: "Confirmed",
                detail: "Activity Form Deleted",
                life: 3000,
            });
            router.delete(route("activity-form.destroy", activityId));
        },
        reject: () => {
            toast.add({
                severity: "error",
                summary: "Rejected",
                detail: "You have Rejected",
                life: 3000,
            });
        },
    });
};

const downloadPDF = (activityId) => {
    const url = `/activity-form-pdf/${activityId}`;
    window.open(url, "_blank");
};

const downloadFile = (id) => {
    window.location.href = `/download-file/${id}`;
};
</script>

<template>
    <Head title=" | Activity Proposal Form" />
    <Toast />
    <ConfirmDialog></ConfirmDialog>
    <div class="w-5/6 m-auto">
        <h1 class="text-3xl text-center my-8">Activity Proposal Form</h1>
        <p>
            (Approval Form for In-Campus Activities with corresponding Logistics
            and Funding Requirements)
        </p>
        <p class="mb-4">
            Note: Deadline of Submission of activity form is one week before the
            activity. Please ensure that the date in the activity form that you
            will generate is correct because it cannot be changed.
        </p>

        <div class="flex gap-4 mb-4">
            <div class="w-4/6 flex flex-col">
                <label class="text-2xl">Activity Title</label>
                <InputText v-model="activity.title" disabled />
            </div>

            <div class="w-2/6 flex flex-col">
                <label class="text-2xl">Type of Event</label>
                <Select
                    v-model="activity.event_type"
                    :options="events"
                    editable
                    disabled
                />
            </div>
        </div>

        <div class="flex flex-col mb-4">
            <label class="text-2xl">Activity Description</label>
            <Textarea
                cols="30"
                rows="4"
                v-model="activity.title"
                disabled
            ></Textarea>
        </div>

        <div class="flex gap-4 mb-4">
            <div class="w-3/4 flex flex-col">
                <label class="text-2xl"
                    >Participants - Department / Program / Grade or Year
                    Level</label
                >
                <Select v-model="activity.participant" disabled />
            </div>

            <div class="w-1/4 flex flex-col">
                <label class="text-2xl">Expected Number of Attendees</label>
                <InputNumber v-model="activity.attendance_count" disabled />
            </div>
        </div>

        <div class="flex gap-4 mb-4">
            <div class="w-1/2 flex flex-col">
                <label class="text-2xl">Start Date/Time</label>
                <InputText v-model="activity.start_date" disabled />
            </div>

            <div class="w-1/2 flex flex-col">
                <label class="text-2xl">End Date/Time</label>
                <InputText v-model="activity.end_date" disabled />
            </div>
        </div>

        <div class="flex flex-col mb-4">
            <label class="text-2xl">Venue</label>
            <Select
                v-model="activity.venue"
                :options="venues.map((venue) => venue.name)"
                disabled
            />
        </div>

        <div class="flex flex-col mb-4">
            <label class="text-2xl">Requirements / Resources Needed</label>
            <Textarea
                cols="30"
                rows="4"
                v-model="activity.requirements_or_resources_needed"
                disabled
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
                        :href="`/storage/${activity.payment_or_cash_file}`"
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
                    <a :href="`/storage/${activity.food_file}`" download
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
                    <a :href="`/storage/${activity.supplies_file}`" download
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
                    <a :href="`/storage/${activity.reproduction_file}`" download
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
                    <a :href="`/storage/${activity.others_file}`" download
                        >Download Attached Reproduction Form</a
                    >
                </div>
            </div>
        </div>

        <div class="vertical-line"></div>

        <div class="flex justify-center gap-4 my-8">
            <div v-if="activity.status === 'PENDING'">
                <Button
                    @click="deleteActivityForm(activity.id)"
                    label="Delete"
                    severity="danger"
                    class="px-12 py-4"
                />
            </div>
            <div v-if="activity.status === 'PENDING'">
                <Link :href="route('activity-form.edit', activity.id)">
                    <Button label="Edit" class="px-12 py-4" />
                </Link>
            </div>
            <div v-if="activity.status === 'APPROVED'">
                <Button @click="downloadPDF(activity.id)" label="Download PDF" class="px-12 py-4" />
            </div>
        </div>
    </div>
</template>

<style scoped>
.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin: 2rem 0;
}
</style>
