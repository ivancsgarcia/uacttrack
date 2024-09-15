<template>
    <div class="wrapper">
        <UAHeader />
    </div>

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
            <tr class="text-center h-20">
                <td class="data w-1/5 border">00</td>
                <td class="data w-3/5 border">Activity Title</td>
                <td class="data w-1/5 border">00/00/00</td>
            </tr>
        </table>
    </div>

</template>

<script setup>

</script>

<style scoped>
    .wrapper {
        padding-bottom: 8vh;
    }
    .data {
        background-color: #D9D9D9;
    }
</style>