<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

defineOptions({ layout: AdminLayout });

const props = defineProps({
    approvedForms: Object,
});
</script>

<template>
    <h1 class="text-center text-3xl font-bold mb-6 text-ua-blue">
        Approved Activity Proposal Forms
    </h1>

    <!-- When no data -->
    <div
        v-if="!approvedForms.data.length"
        class="text-center py-8 text-ua-blue"
    >
        No approved activity proposal forms available.
    </div>

    <!-- Data table -->
    <div v-else>
        <table class="w-full">
            <tr class="bg-ua-blue text-white">
                <th class="w-1/12 py-4">ID</th>
                <th class="w-2/12">Organization</th>
                <th class="">Activity Title</th>
                <th class="w-2/12">Date Approved</th>
            </tr>
            <tbody>
                <tr
                    v-for="(form, index) in approvedForms.data"
                    :key="form.id"
                    class="text-center"
                >
                    <td class="bg-ua-gray py-4">
                        {{ index + 1 }}
                    </td>
                    <td class="bg-ua-gray text-ua-blue">
                        {{ form.creator.organization.name }}
                    </td>
                    <td class="bg-ua-gray underline">
                        <Link :href="route('activity-form.show', form.id)">{{
                            form.title
                        }}</Link>
                    </td>
                    <td class="bg-ua-gray">
                        {{
                            new Date(form.updated_at).toLocaleDateString(
                                "en-US"
                            )
                        }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <PaginationLinks
        v-if="approvedForms.data.length >= 6"
        :paginator="approvedForms"
    />
</template>
