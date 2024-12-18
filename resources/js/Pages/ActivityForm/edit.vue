<script setup>
import { useForm } from "@inertiajs/vue3";
import APF from "../../components/apf/APF.vue";
import APF1 from "../../components/apf/APF1.vue";
import APF2 from "../../components/apf/APF2.vue";
import APF3 from "../../components/apf/APF3.vue";

import Stepper from "primevue/stepper";
import StepList from "primevue/steplist";
import StepPanels from "primevue/steppanels";
import StepItem from "primevue/stepitem";
import Step from "primevue/step";
import StepPanel from "primevue/steppanel";

import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

const props = defineProps({
    activityForms: Object,
    logoPath: String,
    venues: Object,
});

const form = useForm({
    check_payment_or_cash: props.activityForms.check_payment_or_cash,
    food: props.activityForms.food,
    supplies: props.activityForms.supplies,
    reproduction: props.activityForms.reproduction,
    others: props.activityForms.others,
    date: props.activityForms.date,
    from_time: props.activityForms.from_time,
    to_time: props.activityForms.to_time,
    attendance_count: props.activityForms.attendance_count,
    event_type: props.activityForms.event_type,
    venue: props.activityForms.venue,
    requirements_or_resources_needed:
        props.activityForms.requirements_or_resources_needed,
    title: props.activityForms.title,
    description: props.activityForms.description,
    participant: props.activityForms.participant,
    payment_or_cash_file: null,
    food_file: null,
    supplies_file: null,
    reproduction_file: null,
    others_file: null,
});

const confirm = useConfirm();
const toast = useToast();

const cancel = () => {
    confirm.require({
        header: "Danger Zone",
        icon: "pi pi-info-circle",
        message: "Are you sure you want to exit from the form?",
        rejectProps: {
            label: "Cancel",
            severity: "secondary",
            outlined: true,
        },
        acceptProps: {
            label: "Exit",
            severity: "danger",
        },
        accept: () => {
            window.location.href = route("home");
            toast.add({
                severity: "success",
                summary: "Confirmed",
                life: 3000,
            });
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Cancelled",
                life: 3000,
            });
        },
    });
};

const openForms = () => {
    confirm.require({
        header: "Download Forms",
        icon: "pi pi-info-circle",
        message:
            "Are you sure you want to redirect to the Downloadable Forms Page?",
        rejectProps: {
            label: "No",
            severity: "secondary",
            outlined: true,
        },
        acceptProps: {
            label: "Yes",
            severity: "success",
        },
        accept: () => {
            toast.add({
                severity: "success",
                summary: "Confirmed",
                detail: "Going to the Downloadable Forms Page.",
                life: 3000,
            });
            window.location.href = route("request-form");
        },
        reject: () => {
            toast.add({
                severity: "info",
                summary: "Declined",
                detail: "You cancelled.",
                life: 3000,
            });
        },
    });
};

const submit = () => {
    try {
        confirm.require({
            message: "Are you sure you want to submit the Form?",
            header: "Download Forms",
            icon: "pi pi-info-circle",
            rejectProps: {
                label: "Cancel",
                severity: "secondary",
                outlined: true,
            },
            acceptProps: {
                label: "Submit",
                severity: "success",
            },
            accept: async () => {
                try {
                    await submitForm();
                    toast.add({
                        severity: "success",
                        summary: "Confirmed",
                        detail: "Form Created.",
                        life: 3000,
                    });
                } catch (error) {
                    console.error("Error submitting form:", error);
                    toast.add({
                        severity: "error",
                        summary: "Error",
                        detail: "Failed to create form. Please try again.",
                        life: 3000,
                    });
                }
            },
            reject: () => {
                toast.add({
                    severity: "info",
                    summary: "Cancelled",
                    detail: "You cancelled.",
                    life: 3000,
                });
            },
        });
    } catch (error) {
        console.error("Error showing confirmation dialog:", error);
        toast.add({
            severity: "error",
            summary: "Error",
            detail: "Something went wrong. Please try again.",
            life: 3000,
        });
    }
};

const submitForm = async () => {
    form.processing = true;
    try {
        const response = await form.post(route("activity-form"));
        return response;
    } catch (error) {
        console.error("Form submission error:", error);
        throw error;
    } finally {
        form.processing = false;
    }
};
</script>
<!-- @submit.prevent="submitForm" -->
<template>
    <div class="app">
        <UAHeader />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="main-content">
            <form>
                <Stepper value="1" linear>
                    <StepList>
                        <Step
                            value="1"
                            :pt="{
                                number: '!text-ua-blue',
                                title: ' !text-ua-blue',
                            }"
                            >Start</Step
                        >
                        <Step
                            value="2"
                            :pt="{
                                number: '!text-ua-blue',
                                title: ' !text-ua-blue',
                            }"
                            >Projected Funding Needs</Step
                        >
                        <Step
                            value="3"
                            :pt="{
                                number: '!text-ua-blue',
                                title: ' !text-ua-blue',
                            }"
                            >Date and Venue Booking</Step
                        >
                        <Step
                            value="4"
                            :pt="{
                                number: '!text-ua-blue',
                                title: ' !text-ua-blue',
                            }"
                            >Activity Form</Step
                        >
                    </StepList>
                    <StepPanels>
                        <StepPanel v-slot="{ activateCallback }" value="1">
                            <div class="flex flex-col">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium"
                                >
                                    <APF :images="images" />
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
                                    :pt="{
                                        root: {
                                            class: '!bg-ua-blue !outline-none !border-none !hover:bg-ua-blue/80 !hover:border-2',
                                        },
                                    }"
                                    icon="pi pi-arrow-right"
                                    iconPos="right"
                                    @click="activateCallback('2')"
                                />
                            </div>
                        </StepPanel>
                        <StepPanel v-slot="{ activateCallback }" value="2">
                            <div class="flex flex-col">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium"
                                >
                                    <APF1 :form="form" />
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
                                    label="Forms"
                                    :pt="{
                                        root: '!bg-ua-yellow !text-ua-blue !outline-none !border-none',
                                    }"
                                    icon="pi pi-bars"
                                    @click="openForms"
                                />
                                <Button
                                    label="Next"
                                    :pt="{
                                        root: '!bg-ua-blue !outline-none !border-none',
                                    }"
                                    icon="pi pi-arrow-right"
                                    iconPos="right"
                                    @click="activateCallback('3')"
                                />
                            </div>
                        </StepPanel>
                        <StepPanel v-slot="{ activateCallback }" value="3">
                            <div class="flex flex-col">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium"
                                >
                                    <APF2
                                        :form="form"
                                        @nextStep="nextStep"
                                        @previousStep="previousStep"
                                        :venues="props.venues"
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
                                    :pt="{
                                        root: '!bg-ua-blue !outline-none !border-none',
                                    }"
                                    icon="pi pi-arrow-right"
                                    iconPos="right"
                                    @click="activateCallback('4')"
                                />
                            </div>
                        </StepPanel>
                        <StepPanel v-slot="{ activateCallback }" value="4">
                            <div class="flex flex-col">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium"
                                >
                                    <APF3
                                        :form="form"
                                        @previousStep="previousStep"
                                        @submitForm="submitForm"
                                        :venues="props.venues"
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
                                    label="Update"
                                    :disabled="form.processing"
                                    :pt="{
                                        root: '!bg-ua-blue !outline-none !border-none',
                                    }"
                                    icon="pi pi-arrow-right"
                                    iconPos="right"
                                    @click="submit"
                                />
                            </div>
                        </StepPanel>
                    </StepPanels>
                </Stepper>
            </form>

            <ConfirmDialog></ConfirmDialog>
            <Toast />
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
</style>
