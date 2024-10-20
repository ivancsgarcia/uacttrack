<script setup>
    defineProps({
        rejectedForms: Array,
    })
</script>

<template>
    <div class="app flex pt-16">
      <UAHeader />
      <AdminSideMenu/>

      <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

      <div class="main-content w-screen ml-64 p-5">
            <div class="flex justify-between items-center mt-5 mx-12 mb-4">
                <Account class="account" /> 

                <div class="flex justify-center items-center gap-5">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
                </div>
            </div>

            <div class="h-0.5 bg-ua-blue mb-8"></div>

            <h1 class="text-center text-4xl mb-4 text-ua-blue">
                Rejected Activity Proposal Form
            </h1>

            <table class="w-full border-separate border-spacing-4">
                <tr class="bg-ua-blue text-white h-20">
                    <th class="w-1/5 border">Transaction Number</th>
                    <th class="w-3/5 border">Activity Title</th>
                    <th class="w-1/5 border">Date</th>
                </tr>

                <!-- fetch data -->
                <tr class="text-center h-20" v-for="form in rejectedForms" :key="form.id">
                    <td class="bg-ua-gray w-1/5 border">{{ form.id }}</td>
                    <td class="bg-ua-gray w-3/5 border">{{ form.title }}</td>
                    <td class="bg-ua-gray w-1/5 border">{{ new Date(form.created_at).toLocaleDateString('en-US') }}</td>
                </tr>
            </table>
        </div>
    </div>
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
    width: 60rem;
    filter: grayscale(100%);
    opacity: 0.1;
}
</style>