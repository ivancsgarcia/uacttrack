<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { router } from "@inertiajs/vue3";
import APF from "../components/apf/APF.vue";
import APF1 from "../components/apf/APF1.vue";
import APF2 from "../components/apf/APF2.vue";
import APF3 from "../components/apf/APF3.vue";

import Stepper from "primevue/stepper";
import StepList from "primevue/steplist";
import StepPanels from "primevue/steppanels";
import StepItem from "primevue/stepitem";
import Step from "primevue/step";
import StepPanel from "primevue/steppanel";

import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

const props = defineProps({
    venues: Object,
});

const form = useForm({
    check_payment_or_cash: false,
    food: false,
    supplies: false,
    reproduction: false,
    date: null,
    from_time: null,
    to_time: null,
    attendance_count: null,
    event_type: null,
    venue: null,
    requirements_or_resources_needed: null,
    title: null,
    description: null,
    participant: null,
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
            // router.get(route("home"));
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
        accept: () => {
            toast.add({
                severity: "success",
                summary: "Confirmed",
                detail: "Form Created.",
                life: 3000,
            });
            submitForm();
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
};

const submitForm = async () => {
    form.processing = true;
    try {
        await form.post(route("activity-form"));
    } catch (error) {
        console.error(error);
    } finally {
        form.processing = false;
    }
};
</script>

<template>
    <div class="app">
        <UAHeader />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="main-content">
            <form @submit.prevent="submitForm">
                <Stepper value="1" linear>
                    <StepList>
                        <Step value="1">Start</Step>
                        <Step value="2">Projected Funding Needs</Step>
                        <Step value="3">Date and Venue Booking</Step>
                        <Step value="4">Activity Form</Step>
                    </StepList>
                    <StepPanels>
                        <StepPanel v-slot="{ activateCallback }" value="1">
                            <div class="flex flex-col">
                                <div
                                    class="border-2 border-dashed border-surface-200 dark:border-surface-700 rounded bg-surface-50 dark:bg-surface-950 flex-auto flex justify-center items-center font-medium"
                                >
                                    <APF />
                                </div>
                            </div>
                            <div class="flex pt-6 justify-between">
                                <Button
                                    label="Cancel"
                                    severity="secondary"
                                    icon="pi pi-arrow-right"
                                    @click="cancel"
                                />
                                <Button
                                    label="Start"
                                    icon="pi pi-arrow-right"
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
                                    icon="pi pi-arrow-right"
                                    @click="activateCallback('1')"
                                />
                                <Button
                                    label="Forms"
                                    severity="info"
                                    icon="pi pi-bars"
                                    @click="openForms"
                                />
                                <Button
                                    label="Next"
                                    icon="pi pi-arrow-right"
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
                                    label="Submit"
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
    width: 60rem;
    filter: grayscale(100%);
    opacity: 0.1;
}

.main-content {
    padding: 1rem;
}
</style>
