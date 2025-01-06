<script setup>
import HeaderLayout from "../../Layouts/HeaderLayout.vue";
import { useForm } from "@inertiajs/vue3";
import APF1 from "../../components/apf/APF1.vue";
import APF2 from "../../components/apf/APF2.vue";
import APF3 from "../../components/apf/APF3.vue";
import APF4 from "../../components/apf/APF4.vue";
import APF5 from "../../components/apf/APF5.vue";
import Stepper from "primevue/stepper";
import StepList from "primevue/steplist";
import StepPanels from "primevue/steppanels";
import StepItem from "primevue/stepitem";
import Step from "primevue/step";
import StepPanel from "primevue/steppanel";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

defineOptions({ layout: HeaderLayout });
defineProps({
    events: Array,
    venues: Array,
    participants: Array,
    images: Array,
    approvedForms: Object,
});

const form = useForm({
    start_date: null,
    end_date: null,
    participant: null,
    attendance_count: 0,
    venue: null,

    title: null,
    event_type: null,
    description: null,
    requirements_or_resources_needed: null,

    payment_or_cash_file: null,
    food_file: null,
    supplies_file: null,
    reproduction_file: null,
    others_file: null,
});

function updateForm(newValues) {
    Object.assign(form, newValues);
}

const confirm = useConfirm();
const toast = useToast();

const cancel = () => {
    confirm.require({
        header: "Cancel Form Creation?",
        icon: "pi pi-exclamation-triangle",
        message: "Are you sure you want to cancel creating this form?",
        rejectProps: {
            label: "No, Continue Creating Form",
            severity: "secondary",
            outlined: true,
        },
        acceptProps: {
            label: "Yes, Cancel Form",
            severity: "danger",
        },
        accept: () => {
            window.location.href = route("home");
            toast.add({
                severity: "warn",
                summary: "Form Creation Canceled",
                detail: "You have canceled creating the form.",
                life: 3000,
            });
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Continue Creating Form",
                detail: "You can continue filling out the form.",
                life: 3000,
            });
        },
    });
};

const openForms = () => {
    confirm.require({
        header: "Proceed to Download Forms?",
        icon: "pi pi-info-circle",
        message:
            "Are you sure you want to go to the download forms page? Data will be lost.",
        rejectProps: {
            label: "No, Stay Here",
            severity: "secondary",
            outlined: true,
        },
        acceptProps: {
            label: "Yes, Go to Downloads",
            severity: "primary",
        },
        accept: () => {
            window.location.href = route("request-form");
            toast.add({
                severity: "info",
                summary: "Redirecting",
                detail: "Navigating to the download forms page.",
                life: 3000,
            });
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Action Canceled",
                detail: "You chose to stay on the current page.",
                life: 3000,
            });
        },
    });
};

const submit = () => {
    confirm.require({
        header: "Submit Activity Form?",
        message:
            "Please review all the information before submitting. This action cannot be undone.",
        icon: "pi pi-info-circle",
        rejectProps: {
            label: "No, Review Again",
            severity: "secondary",
            outlined: true,
        },
        acceptProps: {
            label: "Yes, Submit Form",
            severity: "success",
        },
        accept: () => {
            form.post(route("activity-form.store"), {
                onSuccess: () => {
                    toast.add({
                    severity: "success",
                    summary: "Form Submitted",
                    detail: "Your activity form has been successfully created.",
                    life: 3000,
                });
                },
                onError: () => {
                    toast.add({
                    severity: "error",
                    summary: "Submission Failed",
                    detail: "Unable to create form. Please check your inputs and try again.",
                    life: 3000,
                });
                },
            });
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Review Canceled",
                detail: "You chose to review the form again.",
                life: 3000,
            });
        },
    });
};
</script>

<template>
    <Head title=" | Activity Form" />
    <ConfirmDialog></ConfirmDialog>
    <Toast />

    <form @submit.prevent="submit">
        <Stepper value="1" linear>
            <StepList>
                <Step value="1">Activity Proposal</Step>
                <Step value="2">Projected Funding Needs</Step>
                <Step value="3">Booking and Reservation Details</Step>
                <Step value="4">Event Details</Step>
                <Step value="5">Summary</Step>
            </StepList>
            <StepPanels>
                <StepPanel v-slot="{ activateCallback }" value="1">
                    <div class="flex flex-col">
                        <div
                            class="border-2 border-dashed border-surface-200 rounded bg-surface-50 flex-auto flex justify-center items-center font-medium"
                        >
                            <APF1 :images="images" />
                        </div>
                    </div>
                    <div class="flex pt-6 justify-between">
                        <Button
                            label="Cancel"
                            severity="secondary"
                            icon="pi pi-arrow-left"
                            @click="cancel"
                        />
                        <Button
                            label="Start"
                            icon="pi pi-arrow-right"
                            iconPos="right"
                            @click="activateCallback('2')"
                        />
                    </div>
                </StepPanel>
                <StepPanel v-slot="{ activateCallback }" value="2">
                    <div class="flex flex-col">
                        <div
                            class="border-2 border-dashed border-surface-200 rounded bg-surface-50 flex-auto flex justify-center items-center font-medium"
                        >
                            <APF2 :form="form" />
                        </div>
                    </div>
                    <div class="flex pt-6 justify-between">
                        <Button
                            label="Back"
                            severity="secondary"
                            icon="pi pi-arrow-left"
                            @click="activateCallback('1')"
                        />
                        <Button
                            class="bg-ua-yellow"
                            label="Forms"
                            icon="pi pi-bars"
                            @click="openForms"
                        />
                        <Button
                            label="Next"
                            icon="pi pi-arrow-right"
                            iconPos="right"
                            @click="activateCallback('3')"
                        />
                    </div>
                </StepPanel>
                <StepPanel v-slot="{ activateCallback }" value="3">
                    <div class="flex flex-col">
                        <div
                            class="border-2 border-dashed border-surface-200 rounded bg-surface-50 flex-auto flex justify-center items-center font-medium"
                        >
                            <APF3
                                :form="form"
                                :venues="venues"
                                :approvedForms="approvedForms"
                                :participants="participants"
                                @updateForm="updateForm"
                                @nextStep="nextStep"
                                @previousStep="previousStep"
                            />
                        </div>
                    </div>
                    <div class="flex pt-6 justify-between">
                        <Button
                            label="Back"
                            severity="secondary"
                            icon="pi pi-arrow-left"
                            @click="activateCallback('2')"
                        />
                        <Button
                            label="Next"
                            icon="pi pi-arrow-right"
                            iconPos="right"
                            @click="activateCallback('4')"
                        />
                    </div>
                </StepPanel>
                <StepPanel v-slot="{ activateCallback }" value="4">
                    <div class="flex flex-col">
                        <div
                            class="border-2 border-dashed border-surface-200 rounded bg-surface-50 flex-auto flex justify-center items-center font-medium"
                        >
                            <APF4
                                :form="form"
                                @nextStep="nextStep"
                                @previousStep="previousStep"
                                :events="events"
                            />
                        </div>
                    </div>
                    <div class="flex pt-6 justify-between">
                        <Button
                            label="Back"
                            severity="secondary"
                            icon="pi pi-arrow-left"
                            @click="activateCallback('3')"
                        />
                        <Button
                            label="Next"
                            icon="pi pi-arrow-right"
                            iconPos="right"
                            @click="activateCallback('5')"
                        />
                    </div>
                </StepPanel>
                <StepPanel v-slot="{ activateCallback }" value="5">
                    <div class="flex flex-col">
                        <div
                            class="border-2 border-dashed border-surface-200 rounded bg-surface-50 flex-auto flex justify-center items-center font-medium"
                        >
                            <APF5
                                :form="form"
                                :participants="participants"
                                :venues="venues"
                                :events="events"
                                @previousStep="previousStep"
                            />
                        </div>
                    </div>
                    <div class="flex pt-6 justify-between">
                        <Button
                            label="Back"
                            severity="secondary"
                            icon="pi pi-arrow-left"
                            @click="activateCallback('4')"
                        />

                        <Button
                            type="submit"
                            :disabled="form.processing"
                            label="Submit"
                            icon="pi pi-send"
                            iconPos="right"
                        />
                    </div>
                </StepPanel>
            </StepPanels>
        </Stepper>
    </form>
</template>