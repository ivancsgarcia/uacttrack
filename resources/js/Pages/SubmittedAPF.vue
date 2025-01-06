<script setup>
import { Link, router } from "@inertiajs/vue3";
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });
defineProps({
    activityForms: Object,
});

const createAPF = () => {
    router.get(route("activity-form.create"));
};
</script>

<template>
    <Head title=" | Submitted APF" />

    <h1 class="text-center text-3xl font-bold mb-6 text-ua-blue">
        Submitted Activity Proposal Form
    </h1>

    <div v-if="!activityForms.data.length" class="mt-8">
        <p class="text-center text-bold mb-4">
            No activity proposals have been submitted yet.
        </p>

        <Button
            @click="createAPF"
            raised
            size="large"
            label="Create an APF"
            class="block mx-auto"
        />
    </div>

    <div v-else>
        <table class="w-4/5 mx-auto">
            <thead>
                <tr class="bg-ua-blue text-white border-b-4 border-white">
                    <th class="w-1/5 py-4">ID</th>
                    <th class="w-3/5">Activity Title</th>
                    <th class="w-1/5">Date Created</th>
                </tr>
            </thead>
            <tbody v-for="(form, index) in activityForms.data" :key="form.id">
                <tr class="text-center border-b-4 border-white">
                    <td class="bg-ua-gray w-1/5 py-4">
                        {{ index + 1 }}
                    </td>
                    <td class="bg-ua-gray w-3/5 underline">
                        <Link :href="route('activity-form.show', form.id)">{{
                            form.title
                        }}</Link>
                    </td>
                    <td class="bg-ua-gray w-1/5">
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

    <PaginationLinks
        v-if="activityForms.data.length >= 6"
        :paginator="activityForms"
    />
</template>