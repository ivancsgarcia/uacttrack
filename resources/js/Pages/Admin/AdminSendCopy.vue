<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";
import { useConfirm } from "primevue/useconfirm";
import { useToast } from "primevue/usetoast";

defineOptions({ layout: AdminLayout });

const props = defineProps({
    activityForms: Object,
});

const confirm = useConfirm();
const toast = useToast();

// Create reactive forms data and add editing mode state for each form
const forms = ref(
    props.activityForms.data.map((form) => ({
        ...useForm(form),
        editing: false, // Track if the form is in edit mode
        originalValues: { ...form }, // Store original values to reset if canceled
    }))
);

// Method to start editing a specific form
const startEdit = (form) => {
    form.editing = true;
};

// Method to cancel editing and reset a specific form
const cancelEdit = (form) => {
    form.editing = false;
    form.reset(); // Reset to the original values
};

// Method to save changes for a specific form
const saveChanges = (form) => {
    form.post(`/activity-forms/${form.id}/update`, {
        onSuccess: () => {
            toast.add({
                severity: "success",
                summary: "Success",
                detail: "Changes saved successfully!",
                life: 3000,
            });
            form.editing = false;
        },
        onError: () => {
            toast.add({
                severity: "error",
                summary: "Error",
                detail: "Failed to save changes. Please try again.",
                life: 3000,
            });
        },
    });
};
</script>

<template>
    <h1 class="text-center text-4xl mb-4 text-ua-blue">
        Send Copies of Activity Forms
    </h1>

    <table v-if="forms && forms.length > 0">
        <tr>
            <th colspan="2">Transaction Number</th>
            <th colspan="2">Activity Title</th>
        </tr>
        <tbody v-for="form in forms" :key="form.id">
            <tr>
                <td colspan="2">{{ form.id }}</td>
                <td colspan="2">{{ form.title }}</td>
            </tr>
            <tr>
                <th colspan="4">Send Copies To:</th>
            </tr>
            <tr>
                <td>Proponent</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.proponent"
                        :disabled="!form.editing"
                    />
                </td>
                <td>Security</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.security"
                        :disabled="!form.editing"
                    />
                </td>
            </tr>
            <tr>
                <td>EAMO</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.eamo"
                        :disabled="!form.editing"
                    />
                </td>
                <td>Janitorial</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.janitorial"
                        :disabled="!form.editing"
                    />
                </td>
            </tr>
            <tr>
                <td>PhotoLab</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.photoLab"
                        :disabled="!form.editing"
                    />
                </td>
                <td>Sports</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.sports"
                        :disabled="!form.editing"
                    />
                </td>
            </tr>
            <tr>
                <td>PPGS</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.ppgs"
                        :disabled="!form.editing"
                    />
                </td>
                <td>Hotel</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.hotel"
                        :disabled="!form.editing"
                    />
                </td>
            </tr>
            <tr>
                <td>Sound System</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.soundSystem"
                        :disabled="!form.editing"
                    />
                </td>
                <td>Others</td>
                <td>
                    <input
                        type="checkbox"
                        v-model="form.others_specify"
                        :disabled="!form.editing"
                    />
                </td>
            </tr>

            <tr v-if="!form.editing">
                <td
                    colspan="4"
                    @click="startEdit(form)"
                    class="cursor-pointer hover:text-ua-blue hover:bg-ua-yellow"
                >
                    Edit
                </td>
            </tr>

            <tr v-else>
                <td
                    colspan="2"
                    @click="cancelEdit(form)"
                    class="cursor-pointer hover:text-white hover:bg-red-500"
                >
                    Cancel
                </td>
                <td
                    colspan="2"
                    @click="saveChanges(form)"
                    class="cursor-pointer hover:text-white hover:bg-ua-blue"
                >
                    Confirm
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4" class="!border-transparent"></td>
            </tr>
        </tfoot>
    </table>
    <div v-else class="text-center mt-8 text-ua-blue">No forms available.</div>
    <div class="w-2/4 mx-auto">
        <PaginationLinks :paginator="props.activityForms" />
    </div>
</template>

<style scoped>
table {
    margin: auto;
    border-collapse: collapse;
}
th,
td {
    padding: 1rem;
    text-align: center;
}

table,
th,
td {
    border: 4px solid #272f5c;
}

th {
    font-weight: bold;
    font-size: 1.5rem;
}

td {
    font-size: 1.2rem;
}

input {
    transform: scale(2);
}
</style>
