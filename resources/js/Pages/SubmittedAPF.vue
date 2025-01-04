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

    <h1 class="text-center text-4xl mb-4 text-ua-blue">
        Submitted Activity Proposal Form
    </h1>

    <table class="w-full border-separate border-spacing-4">
        <thead>
            <tr class="bg-ua-blue text-white h-20">
                <th class="w-1/5 border text-lg">Transaction Number</th>
                <th class="w-3/5 border text-lg">Activity Title</th>
                <th class="w-1/5 border text-lg">Date</th>
            </tr>
        </thead>

        <tbody v-for="(form, index) in activityForms.data" :key="form.id">
            <tr class="text-center h-20">
                <td class="bg-ua-gray w-1/5 border text-lg">
                    {{ (activityForms.current_page - 1) * activityForms.per_page + index + 1 }}
                </td>
                <td class="bg-ua-gray w-3/5 border text-lg underline">
                    <Link :href="route('activity-form.show', form.id)">{{
                        form.title
                    }}</Link>
                </td>
                <td class="bg-ua-gray w-1/5 border text-lg">
                    {{ new Date(form.created_at).toLocaleDateString("en-US") }}
                </td>
            </tr>
        </tbody>
    </table>
    <div v-if="!activityForms.data.length" class="mt-4">
        <p class="text-lg text-center text-bold mt-4">
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
    <PaginationLinks
        v-if="activityForms.data.length"
        :paginator="activityForms"
    />
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

.main-content {
    margin-left: 16rem;
    padding: 1rem;
}

.account-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem;
}

.icons-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
}

.icon:hover {
    cursor: pointer;
    color: gold;
}

.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
}
</style>
