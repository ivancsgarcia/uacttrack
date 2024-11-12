<script setup>
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });

defineProps({
    requestForms: Array,
});
</script>

<template>
    <Head title=" | Forms" />
    <h2>University of the Assumption Forms</h2>

    <table>
        <thead>
            <tr>
                <th>Form Titles</th>
                <th colspan="2">Download File</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="reqForm in requestForms" :key="reqForm.id">
                <td>{{ reqForm.name }}</td>
                <td class="underline">
                    <a :href="reqForm.docx_url" download>docx</a>
                </td>
                <td class="underline">
                    <a :href="reqForm.xlsx_url" download>xlsx</a>
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

h2 {
    text-align: center;
    color: #272f5c;
    font-size: 2.2rem;
    margin: -1rem 0 0.5rem;
    letter-spacing: 0.05rem;
}

.title {
    width: 50%;
    background-color: rgba(39, 47, 92, 0.8);
    font-size: 2rem;
    padding: 10px;
    text-align: center;
    color: #fff;
}

.dl {
    width: 20%;
}

table {
    text-align: center;
    border-collapse: separate;
    width: 80%;
    margin: auto;
    border-spacing: 1rem;
}

thead {
    background-color: #272f5c;
    color: white;
}

tbody {
    background-color: #d9d9d9;
}

th,
td {
    border: 1px;
    padding: 1.2rem;
    font-size: 1.4rem;
}
</style>
