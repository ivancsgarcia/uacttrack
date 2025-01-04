<script setup>
import { Link } from "@inertiajs/vue3";
import AdminLayout from "../../Layouts/AdminLayout.vue";

defineOptions({ layout: AdminLayout });

const props = defineProps({
    rejectedForms: Object,
});
</script>

<template>
    <h1 class="text-center text-4xl mb-4 text-ua-blue">
        Rejected Activity Proposal Forms
    </h1>

    <table class="w-full border-separate border-spacing-4">
        <tr class="bg-ua-blue text-white h-20">
            <th class="w-1/5 border">Transaction Number</th>
            <th class="w-3/5 border">Activity Title</th>
            <th class="w-1/5 border">Date</th>
        </tr>

        <!-- fetch data -->
        <tbody>
            <tr
                v-for="(form, index) in rejectedForms.data"
                :key="form.id"
                class="text-center h-20"
            >
                <td class="bg-ua-gray w-1/5 border">
                    {{ index + 1 }}
                </td>
                <td class="bg-ua-gray w-3/5 border underline">
                    <Link :href="route('activity-form.show', form.id)">{{
                        form.title
                    }}</Link>
                </td>
                <td class="bg-ua-gray w-1/5 border">
                    {{ new Date(form.created_at).toLocaleDateString("en-US") }}
                </td>
            </tr>
        </tbody>
    </table>
    <div
        v-if="!rejectedForms.data.length"
        class="text-center my-4 text-ua-blue"
    >
        No rejected activity proposal forms available.
    </div>
    <PaginationLinks v-else :paginator="rejectedForms" />
</template>

<style scoped></style>
