<script setup>
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });

defineProps({
    requestForms: Array,
});
</script>

<template>
    <Head title=" | Forms" />
    <h2 class="text-3xl text-center font-bold tracking-wider mb-4">University of the Assumption Forms</h2>

    <table class="w-4/5 mx-auto text-center ">
        <thead class="bg-ua-blue text-white">
            <tr class="border-b-8 border-white">
                <th class="py-4">Form Titles</th>
                <th colspan="2">Download File</th>
            </tr>
        </thead>
        <tbody class="bg-ua-gray">
            <tr v-for="reqForm in requestForms" :key="reqForm.id" class="border-b-8 border-white">
                <td class="py-4">{{ reqForm.name }}</td>
                <td class="underline">
                    <a :href="reqForm.download_link" download>Download</a>
                </td>
            </tr>
        </tbody>
    </table>
</template>

<style scoped>
.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
}
</style>
