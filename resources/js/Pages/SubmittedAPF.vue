<template>
    <div class="app flex pt-16">
        <UAHeader />
    

        <div class="content w-9/12 mx-auto py-16 text-xl bg-rgb(217, 217, 217)">
            <h1 class="text-center text-4xl mb-4 text-ua-blue">
                Submitted Activity Proposal Form
            </h1>

            <table class="w-full border-separate border-spacing-4">
                <thead>
                    <tr class="bg-ua-blue text-white h-20">
                        <th class="w-1/5 border">Transaction Number</th>
                        <th class="w-3/5 border">Activity Title</th>
                        <th class="w-1/5 border">Date</th>
                    </tr>
                </thead>

                
                 <tbody>
                    <!-- fetch data -->
                    <tr class="text-center h-20" v-for="form in activityForms" :key="form.id">
                        <td class="bg-ua-gray w-1/5 border">{{ form.id }}</td>
                        <td class="bg-ua-gray w-3/5 border">{{ form.activityTitle }}</td>
                        <td class="bg-ua-gray w-1/5 border">{{ new Date(form.created_at).toLocaleDateString('en-US') }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</template>

<script setup>
    defineProps({
        activityForms: Array,
    })
</script>

<style scoped>

</style>