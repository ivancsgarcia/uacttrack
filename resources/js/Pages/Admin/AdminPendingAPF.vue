<script setup>
import AdminSideMenu from "../../components/global/AdminSideMenu.vue";
import { ref } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

defineProps({
    activityForms: Array,
});

const confirm = useConfirm();
const toast = useToast();

// Get the props passed from the Laravel controller
const { activityForms, position } = usePage().props;

// Track the status updates
const formStatuses = ref({});
let previousStatus = null;

// Initialize the form statuses based on the existing data
activityForms.forEach((form) => {
    formStatuses.value[form.id] = getInitialStatus(form, position);
});

// Determine the initial status based on the user's position
function getInitialStatus(form, position) {
    if (position === "College Dean") return form.college_dean_status;
    if (position === "OSA") return form.osa_status;
    if (position === "VPAA") return form.vpaa_status;
    if (position === "VPAA") return form.vpa_status;
    return form.status;
}

// Method to update the status in the database
const updateStatus = (formId) => {
    router.post(`/activity-forms/${formId}/status`, {
        status: formStatuses.value[formId],
        position: position,
    });
};

const changeStatus = (form) => {
    previousStatus = formStatuses.value[form.id];
    confirm.require({
        header: "Confirmation",
        icon: "pi pi-info-circle",
        message: "Do you want to change the status?",
        rejectProps: {
            label: "Cancel",
            severity: "secondary",
            outlined: true,
        },
        acceptProps: {
            label: "Yes",
            severity: "success",
        },
        accept: () => {
            updateStatus(form.id);
            toast.add({
                severity: "success",
                summary: "Status Updated",
                life: 3000,
            });
        },
        reject: () => {
            formStatuses.value[form.id] = "PENDING";
            toast.add({
                severity: "error",
                summary: "Cancelled",
                life: 3000,
            });
        },
    });
};
</script>

<template>
    <div class="app flex pt-16">
        <UAHeader />
        <AdminSideMenu />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="main-content w-screen ml-64 p-5">
            <div class="flex justify-between items-center mt-5 mx-12 mb-4">
                <Account class="account" />

                <div class="flex justify-center items-center gap-5">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl" />
                </div>
            </div>

            <div class="h-0.5 bg-ua-blue mb-8"></div>

            <h1 class="text-center text-4xl mb-4 text-ua-blue">
                Pending Activity Proposal Forms
            </h1>

            <table class="w-full border-separate border-spacing-4">
                <thead>
                    <tr class="bg-ua-blue text-white h-20">
                        <th class="w-1/5 border">Transaction Number</th>
                        <th class="w-1/5 border">Date</th>
                        <th>Activity Proposal Form</th>
                        <th class="w-1/5 border">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr
                        v-for="form in activityForms"
                        :key="form.id"
                        class="text-center h-20"
                    >
                        <td class="bg-ua-gray text-ua-blue">{{ form.id }}</td>
                        <td class="bg-ua-gray text-ua-blue">
                            {{
                                new Date(form.created_at).toLocaleDateString(
                                    "en-US"
                                )
                            }}
                        </td>
                        <td class="bg-ua-gray text-ua-blue underline">
                            <Link
                                :href="route('activity-form-preview', form.id)"
                                >{{ form.title }}</Link
                            >
                        </td>
                        <td class="bg-ua-gray text-ua-blue p-0">
                            <select
                                v-model="formStatuses[form.id]"
                                @change="changeStatus(form)"
                                class="w-full h-20 bg-ua-gray p-2"
                            >
                                <option value="PENDING" selected disabled>
                                    Pending
                                </option>
                                <option value="APPROVED">Approved</option>
                                <option value="REJECTED">Rejected</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <ConfirmDialog></ConfirmDialog>
            <Toast />
        </div>
    </div>
</template>

<style scoped>
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

.approval-boxes {
    flex: 1 1 calc(33.333% - 20px);
}
</style>
