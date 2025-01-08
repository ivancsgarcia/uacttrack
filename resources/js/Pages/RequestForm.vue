<script setup>
import Layout from "../Layouts/Layout.vue";
import DataTable from "primevue/datatable";
import Column from "primevue/column";
import ColumnGroup from "primevue/columngroup"; // optional
import Row from "primevue/row"; // optional

defineOptions({ layout: Layout });

defineProps({
    requestForms: Array,
});
</script>

<template>
    <Head title=" | Forms" />
    <!-- <h2 class="text-3xl text-center font-bold tracking-wider mb-4">
        University of the Assumption Forms
    </h2> -->

    <!-- <table class="w-4/5 mx-auto text-center">
        <thead class="bg-ua-blue text-white">
            <tr class="border-b-8 border-white">
                <th class="py-4">Form Titles</th>
                <th colspan="2">Download File</th>
            </tr>
        </thead>
        <tbody class="bg-ua-gray">
            <tr
                v-for="reqForm in requestForms"
                :key="reqForm.id"
                class="border-b-8 border-white"
            >
                <td class="py-4">{{ reqForm.name }}</td>
                <td class="underline">
                    <a :href="reqForm.download_link" download>Download</a>
                </td>
            </tr>
        </tbody>
    </table> -->

    <DataTable
        :value="requestForms"
        size="large"
        rowHover
        tableClass="opacity-90"
    >
        <template #header>
            <div class="text-center">
                <h2 class="text-3xl font-bold text-ua-blue tracking-wider mb-4">
                    University of the Assumption Forms
                </h2>
            </div>
        </template>
        <Column
            field="name"
            header="Form Titles"
            headerClass="text-ua-blue"
            bodyClass="text-ua-blue"
        ></Column>
        <Column
            header="Download File"
            headerClass="text-ua-blue"
            bodyClass="text-ua-blue"
        >
            <template #body="reqForms">
                <a
                    :href="reqForms.data.download_link"
                    download
                    class="underline"
                    >Download</a
                >
            </template>
        </Column>
    </DataTable>
</template>

<style scoped>
.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
}
</style>
