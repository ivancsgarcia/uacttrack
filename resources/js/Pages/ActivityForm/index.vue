<script setup>
import HeaderLayout from "../../Layouts/HeaderLayout.vue";
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

defineOptions({ layout: HeaderLayout });

const props = defineProps({
    venues: Array,
    images: Array,
    approvedForms: Object,
});

const form = useForm({
    check_payment_or_cash: false,
    food: false,
    supplies: false,
    reproduction: false,
    others: false,
    date: null,
    from_time: new Date(),
    to_time: new Date(),
    attendance_count: 0,
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
    proponent: false,
    security: false,
    eamo: false,
    janitorial: false,
    photoLab: false,
    sports: false,
    ppgs: false,
    hotel: false,
    soundSystem: false,
    others_specify: false,
});

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

const isFormValid = () => {
    const isBooleanValid = [
        form.check_payment_or_cash,
        form.food,
        form.supplies,
        form.reproduction,
        form.others,
    ].every((val) => typeof val === "boolean");

    const isDateValid = [form.date, form.from_time, form.to_time].every(
        (val) => val instanceof Date && !isNaN(val.getTime())
    );

    const isAttendanceCountValid =
        form.attendance_count >= 1 &&
        form.attendance_count <= 5000 &&
        Number.isInteger(form.attendance_count);

    const isStringValid = [
        form.event_type,
        form.venue,
        form.requirements_or_resources_needed,
        form.title,
        form.description,
        form.participant,
    ].every((val) => typeof val === "string" && val.trim() !== "");

    const isFileValid =
        (form.payment_or_cash_file
            ? validateFile(form.payment_or_cash_file)
            : true) &&
        (form.food_file ? validateFile(form.food_file) : true) &&
        (form.supplies_file ? validateFile(form.supplies_file) : true) &&
        (form.reproduction_file
            ? validateFile(form.reproduction_file)
            : true) &&
        (form.others_file ? validateFile(form.others_file) : true);

    return (
        isBooleanValid &&
        isDateValid &&
        isAttendanceCountValid &&
        isStringValid &&
        isFileValid
    );
};

const validateFile = (file) => {
    const allowedTypes = ["application/pdf", "image/jpeg", "image/png"];
    const maxSize = 2 * 1024 * 1024; // 2MB

    return allowedTypes.includes(file.type) && file.size <= maxSize;
};

const submit = async () => {
    try {
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
            accept: async () => {
                try {
                    // Call submitForm function and get the result
                    const result = await submitForm();

                    // Check if the result indicates success
                    if (result && result.success) {
                        toast.add({
                            severity: "success",
                            summary: "Form Submitted",
                            detail: "Your activity form has been successfully created.",
                            life: 3000,
                        });
                    } else {
                        // If the submission result indicates failure or is falsy
                        toast.add({
                            severity: "error",
                            summary: "Submission Failed",
                            detail:
                                result && result.message
                                    ? result.message
                                    : "Unable to create form. Please check your inputs and try again.",
                            life: 3000,
                        });
                    }
                } catch (error) {
                    // If submitForm throws an error (e.g., network issues)
                    console.error("Error submitting form:", error);
                    toast.add({
                        severity: "error",
                        summary: "Submission Error",
                        detail: "An error occurred while submitting the form. Please try again later.",
                        life: 3000,
                    });
                }
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
    } catch (error) {
        console.error("Error showing confirmation dialog:", error);
        toast.add({
            severity: "error",
            summary: "Dialog Error",
            detail: "Unable to open confirmation dialog. Please try again.",
            life: 3000,
        });
    }
};

const submitForm = async () => {
    form.processing = true;
    try {
        const response = await form.post(route("activity-form.store"));
        return response;
    } catch (error) {
        console.error("Form submission error:", error);
        throw error;
    } finally {
        form.processing = false;
    }
};
</script>

<template>
    <Head title=" | Activity Form" />
    <form @submit.prevent>
        <Stepper value="1" linear>
            <StepList>
                <Step value="1">Start </Step>
                <Step value="2">Projected Funding Needs</Step>
                <Step value="3">Date and Venue Booking</Step>
                <Step value="4">Activity Form</Step>
            </StepList>
            <StepPanels>
                <StepPanel v-slot="{ activateCallback }" value="1">
                    <div class="flex flex-col">
                        <div
                            class="border-2 border-dashed border-surface-200 rounded bg-surface-50 flex-auto flex justify-center items-center font-medium"
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
                            <APF2
                                :form="form"
                                @nextStep="nextStep"
                                @previousStep="previousStep"
                                :venues="props.venues"
                                :approvedForms="props.approvedForms"
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
                            :disabled="form.processing"
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
</template>

<style scoped></style>
