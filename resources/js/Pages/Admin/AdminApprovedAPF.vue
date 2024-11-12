<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

defineOptions({ layout: AdminLayout });

const props = defineProps({
    approvedForms: Object,
});
</script>

<template>
    <h1 class="text-center text-4xl mb-4 text-ua-blue">
        Approved Activity Proposal Forms
    </h1>

    <div v-if="approvedForms.data && approvedForms.data.length > 0">
        <table class="w-full border-separate border-spacing-4">
            <tr class="bg-ua-blue text-white h-20">
                <th class="w-1/5 border">Transaction Number</th>
                <th class="w-3/5 border">Activity Title</th>
                <th class="w-1/5 border">Date</th>
            </tr>

            <tbody>
                <tr
                    v-for="form in approvedForms.data"
                    :key="form.id"
                    class="text-center h-20"
                >
                    <td class="bg-ua-gray w-1/5 border">
                        {{ form.id }}
                    </td>
                    <td class="bg-ua-gray w-3/5 border underline">
                        <Link :href="route('activity-form.show', form.id)">{{
                            form.title
                        }}</Link>
                    </td>
                    <td class="bg-ua-gray w-1/5 border">
                        {{
                            new Date(form.created_at).toLocaleDateString(
                                "en-US"
                            )
                        }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div v-else class="text-center mt-8 text-ua-blue">
        No approved activity proposal forms available.
    </div>
    <PaginationLinks v-if="approvedForms.links" :paginator="approvedForms" />
</template>

<style scoped></style>
