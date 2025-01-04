<script setup>
import HeaderLayout from "../../Layouts/HeaderLayout.vue";
import { router, Link, usePage } from "@inertiajs/vue3";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";
import { ref, watch } from "vue";

defineOptions({ layout: HeaderLayout });
defineProps({
    activity: Object,
    events: Array,
    venues: Object,
    participants: Array,
});

const confirm = useConfirm();
const toast = useToast();
const page = usePage();
const user = page.props.auth.user;
const showApproveDialog = ref(false);
const showRejectDialog = ref(false);
const disableApproveComments = ref(false);
const disableRejectComments = ref(false);
const approveComment = ref("");

watch(disableApproveComments, (value) => {
    if (value) approveComment.value = "";
});

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
                severity: "info",
                summary: "Cancelled",
                detail: "The activity proposal was not deleted.",
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
const approve = () => {
    confirm.require({
        message: "Are you sure you want to approve this activity proposal?",
        header: "Approve Activity Proposal",
        icon: "pi pi-check-circle",
        rejectProps: {
            label: "Cancel",
            severity: "secondary",
        },
        acceptProps: {
            label: "Yes, Approve",
            severity: "success",
        },
        accept: () => {
            toast.add({
                severity: "success",
                summary: "Approved",
                detail: "The activity proposal has been approved successfully.",
                life: 3000,
            });
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Cancelled",
                detail: "You cancelled the approval process.",
                life: 3000,
            });
        },
    });
};
const reject = () => {
    confirm.require({
        message: "Are you sure you want to reject this activity proposal?",
        header: "Reject Activity Proposal",
        icon: "pi pi-times-circle",
        rejectProps: {
            label: "Cancel",
            severity: "secondary",
        },
        acceptProps: {
            label: "Yes, Reject",
            severity: "danger",
        },
        accept: () => {
            toast.add({
                severity: "warn",
                summary: "Rejected",
                detail: "The activity proposal has been rejected successfully.",
                life: 3000,
            });
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Cancelled",
                detail: "You cancelled the rejection process.",
                life: 3000,
            });
        },
    });
};
</script>

<template>
    <Head title=" | Activity Proposal Form" />
    <Toast />
    <ConfirmDialog></ConfirmDialog>

    <div class="w-5/6 m-auto">
        <h1 class="text-4xl text-center my-8">Activity Proposal Form</h1>
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
                v-model="activity.description"
                disabled
            ></Textarea>
        </div>

        <div class="flex gap-4 mb-4">
            <div class="w-3/4 flex flex-col">
                <label class="text-2xl"
                    >Participants - Department / Program / Grade or Year
                    Level</label
                >
                <Select v-model="activity.participant" :options="participants" disabled />
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

        <div class="flex flex-wrap justify-center gap-4">
            <Card class="w-[calc(33.333%-1rem)] mb-4 text-xl">
                <template #title>Check Payment / Cash</template>
                <template #content>
                    <div>
                        <a
                            :href="`/storage/${activity.payment_or_cash_file}`"
                            download
                            class="underline"
                            >Download Attached FRF or PCF</a
                        >
                    </div>
                </template>
            </Card>

            <Card class="w-[calc(33.333%-1rem)] mb-4 text-xl">
                <template #title>Food</template>
                <template #content>
                    <div>
                        <a
                            :href="`/storage/${activity.food_file}`"
                            download
                            class="underline"
                            >Download Attached RFM</a
                        >
                    </div>
                </template>
            </Card>

            <Card class="w-[calc(33.333%-1rem)] mb-4 text-xl">
                <template #title>Supplies</template>
                <template #content>
                    <div>
                        <a
                            :href="`/storage/${activity.supplies_file}`"
                            download
                            class="underline"
                            >Download Attached RF or PR Form</a
                        >
                    </div>
                </template>
            </Card>

            <Card class="w-[calc(33.333%-1rem)] mb-4 text-xl">
                <template #title>Reproduction</template>
                <template #content>
                    <div>
                        <a
                            :href="`/storage/${activity.reproduction_file}`"
                            download
                            class="underline"
                            >Download Attached Reproduction Form</a
                        >
                    </div>
                </template>
            </Card>

            <Card class="w-[calc(33.333%-1rem)] mb-4 text-xl">
                <template #title>Others, specify</template>
                <template #content>
                    <div>
                        <a
                            :href="`/storage/${activity.others_file}`"
                            download
                            class="underline"
                            >Download Attached Form</a
                        >
                    </div>
                </template>
            </Card>
        </div>

        <div class="vertical-line"></div>

        <div class="flex justify-center gap-4 my-8">
            <div v-if="user.role === 'Admin'" class="space-x-4">
                <Button
                    @click="showRejectDialog = true"
                    size="large"
                    severity="danger"
                    label="Reject"
                />
                <Button
                    @click="showApproveDialog = true"
                    size="large"
                    severity="success"
                    label="Approve"
                />
            </div>
            <div
                v-if="
                    user.role === 'Student Officer' &&
                    activity.status === 'PENDING'
                "
                class="space-x-4"
            >
                <Button
                    @click="deleteActivityForm(activity.id)"
                    label="Delete"
                    severity="danger"
                    size="large"
                />
                <Link :href="route('activity-form.edit', activity.id)">
                    <Button label="Edit" size="large" />
                </Link>
            </div>
            <div v-if="activity.status === 'APPROVED'">
                <Button
                    @click="downloadPDF(activity.id)"
                    label="Download PDF"
                    size="large"
                />
            </div>
        </div>

        <!-- Approve Dialog -->
        <Dialog
            v-model:visible="showApproveDialog"
            modal
            header="Approve Activity Proposal"
        >
            <span class="text-surface-500 dark:text-surface-400 block mb-4"
                >Are you sure you want to approve this activity proposal?</span
            >
            <div class="text-surface-500 dark:text-surface-400">
                <label>Provide Feedback:</label>
                <Textarea
                    v-model="approveComment"
                    :disabled="disableApproveComments"
                    fluid
                    rows="5"
                    cols="30"
                />
                <div class="flex items-center gap-1">
                    <Checkbox v-model="disableApproveComments" binary />
                    <label>No feedback</label>
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <Button
                    type="button"
                    label="Cancel"
                    severity="secondary"
                    @click="showApproveDialog = false"
                ></Button>
                <Button
                    type="button"
                    label="Approve"
                    @click="
                        toast.add({
                            severity: 'success',
                            summary: 'Approved',
                            detail: 'The activity proposal has been approved successfully.',
                            life: 3000,
                        });
                        showApproveDialog = false;
                    "
                ></Button>
            </div>
        </Dialog>

        <!-- Reject Dialog -->
        <Dialog
            v-model:visible="showRejectDialog"
            modal
            header="Reject Activity Proposal"
        >
            <span class="text-surface-500 dark:text-surface-400 block mb-4"
                >Are you sure you want to reject this activity proposal?</span
            >
            <div class="text-surface-500 dark:text-surface-400">
                <label>Provide Feedback:</label>
                <Textarea
                    :disabled="disableRejectComments"
                    fluid
                    rows="5"
                    cols="30"
                />
                <div class="flex items-center gap-1">
                    <Checkbox v-model="disableRejectComments" binary />
                    <label>No feedback</label>
                </div>
            </div>
            <div class="flex justify-end gap-2">
                <Button
                    type="button"
                    label="Cancel"
                    severity="secondary"
                    @click="showRejectDialog = false"
                ></Button>
                <Button
                    type="button"
                    label="Reject"
                    severity="danger"
                    @click="
                        toast.add({
                            severity: 'warn',
                            summary: 'Rejected',
                            detail: 'The activity proposal has been rejected successfully.',
                            life: 3000,
                        });
                        showRejectDialog = false;
                    "
                ></Button>
            </div>
        </Dialog>
    </div>
</template>

<style scoped>
.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin: 2rem 0;
}
</style>
