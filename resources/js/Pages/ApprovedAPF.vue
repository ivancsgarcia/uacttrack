<script setup>
import { Link } from "@inertiajs/vue3";
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });
defineProps({
    approvedForms: Object,
});
</script>

<template>
    <Head title=" | Approved APF" />
    <h1 class="text-center text-3xl font-bold mb-6 text-ua-blue">
        Approved Activity Proposal Form
    </h1>

    <div v-if="!approvedForms.data.length" class="mt-8">
        <p class="text-center text-bold">
            There are no approved activity forms at this time.
        </p>
    </div>

    <div v-else>
        <table class="w-4/5 mx-auto">
            <thead>
                <tr class="bg-ua-blue text-white border-b-4 border-white">
                    <th class="w-1/5 py-4">ID</th>
                    <th class="w-3/5">Activity Title</th>
                    <th class="w-1/5">Date Approved</th>
                </tr>
            </thead>

            <tbody v-for="(form, index) in approvedForms.data" :key="form.id">
                <tr class="text-center border-b-4 border-white">
                    <td class="bg-ua-gray w-1/5 py-4">{{ index + 1 }}</td>
                    <td class="bg-ua-gray w-3/5 underline">
                        <Link :href="route('activity-form.show', form.id)">{{
                            form.title
                        }}</Link>
                    </td>
                    <td class="bg-ua-gray w-1/5">
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
