<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { ref } from "vue";
import { Link, router, usePage } from "@inertiajs/vue3";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

defineOptions({ layout: AdminLayout });

const props = defineProps({
    activityForms: Object,
});

const confirm = useConfirm();
const toast = useToast();

// Get the props passed from the Laravel controller
const { activityForms, position } = usePage().props;

// Track the status updates
const formStatuses = ref({});
let previousStatus = null;

// Initialize the form statuses based on the existing data
activityForms.data.forEach((form) => {
    formStatuses.value[form.id] = getInitialStatus(form, position);
});

// Determine the initial status based on the user's position
function getInitialStatus(form, position) {
    if (position === "College Dean") return form.college_dean_status;
    if (position === "Office of Student Affairs") return form.osa_status;
    if (position === "Vice President for Academic Affairs")
        return form.vpaa_status;
    if (position === "Vice President for Administration")
        return form.vpa_status;
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
    <h1 class="text-center text-4xl mb-4 text-ua-blue">
        Pending Activity Proposal Forms
    </h1>

    <div v-if="activityForms.data && activityForms.data.length > 0">
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
                    v-for="form in activityForms.data"
                    :key="form.id"
                    class="text-center h-20"
                >
                    <td class="bg-ua-gray text-ua-blue">
                        {{ form.id }}
                    </td>
                    <td class="bg-ua-gray text-ua-blue">
                        {{
                            new Date(form.created_at).toLocaleDateString(
                                "en-US"
                            )
                        }}
                    </td>
                    <td class="bg-ua-gray text-ua-blue underline">
                        <Link :href="route('activity-form.show', form.id)">{{
                            form.title
                        }}</Link>
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
    </div>
    <div v-else class="text-center mt-8 text-ua-blue">
        No approved activity proposal forms available.
    </div>
    <PaginationLinks v-if="activityForms.links" :paginator="activityForms" />
    <ConfirmDialog></ConfirmDialog>
    <Toast />
</template>

<style scoped>
.approval-boxes {
    flex: 1 1 calc(33.333% - 20px);
}
</style>
