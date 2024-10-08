<template>
    <div class="app flex pt-16">
        <UAHeader />

        <div class="content w-9/12 mx-auto py-16 text-xl bg-rgb(217, 217, 217)">
            <h1 class="text-center text-4xl mb-8 text-ua-blue">
                Approved Activity Proposal Form
            </h1>

            <table class="w-full border-separate border-spacing-4">
                <tr class="bg-ua-blue text-white h-20">
                    <th class="w-1/5 border">Transaction Number</th>
                    <th class="w-3/5 border">Activity Title</th>
                    <th class="w-1/5 border">Date</th>
                </tr>

                <!-- fetch data -->
                <tr class="text-center h-20" v-for="form in approvedForms" :key="form.id">
                    <td class="bg-ua-gray w-1/5 border">{{ form.id }}</td>
                    <td class="bg-ua-gray w-3/5 border">{{ form.title }}</td>
                    <td class="bg-ua-gray w-1/5 border">{{ new Date(form.created_at).toLocaleDateString('en-US') }}</td>
                </tr>
            </table>
        </div>
    </div>

</template>

<script setup>
    defineProps({
        approvedForms: Array,
    })
</script>

<style scoped>

</style>