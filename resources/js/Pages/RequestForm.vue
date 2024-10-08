<script setup>

defineProps({
    request_forms: Array,
});

</script>

<template>
    <div class="app flex pt-16">
    <UAHeader />
    <SideMenu/>

        <div class="main-content w-screen ml-64 p-5">
            <div class="flex justify-between items-center mt-5 mx-12 mb-4">
                <Account class="account" />
                
                <div class="flex justify-center items-center gap-5">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
                </div>
            </div>

            <div class="h-0.5 bg-ua-blue mb-8"></div>

            <h2 class="text-center text-5xl mb-4">University of the Assumption Forms</h2>

            <table class="w-4/5 mx-auto text-center text-3xl border-separate border-spacing-4">
                <thead class="bg-ua-blue text-white">
                    <tr class="h-20">
                        <th class="border w-9/12" >Form Titles</th>
                        <th colspan="2" class="border">Download File</th>
                    </tr>
                </thead>
                <tbody class="bg-ua-gray">
                    <tr v-for="reqForm in request_forms" :key="reqForm.id" class="h-16">
                        <td class="border">{{ reqForm.name }}</td>
                        <td class="border">pdf</td>
                        <td class="border">docx</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<style scoped>

    .main-content {
        min-height: calc(100vh - 64px);
    }

    h2 {
        color: #272F5C;
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


</style>