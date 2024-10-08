<script setup>
import Box from '../components/dashboard/Box.vue';
import Box2 from '../components/dashboard/Box2.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from "vue";

const visible = ref(false);

</script>

<template>
  <div class="app flex pt-16">
    <UAHeader />
    <SideMenu/>

    <div class="main-content w-screen ml-64 p-5">
      <div class="flex justify-between items-center mt-5 mx-12 mb-4">
          <Account class="account" /> 

          <div class="flex justify-center items-center gap-5">
              <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" class="icon" />
              <font-awesome-icon :icon="['fas', 'bell']" size="2xl" class="icon" />
          </div>
      
      </div>

      <div class="h-0.5 bg-ua-blue mb-12"></div>

      <div class="flex justify-center flex-wrap gap-5 mt-5 mx-12 mb-12">
        <Link :href="route('submitted-apf')">
          <Box title="Submitted" />
        </Link>
        <Link :href="route('approved-apf')">
          <Box title="Approved" />
        </Link>
        <Link :href="route('rejected-apf')">
          <Box title="Rejected" />
        </Link>
      </div>

      <div class="h-0.5 w-2/4 bg-ua-blue mt-14 mb-8 mx-auto"></div>

      <h2 class="text-3xl text-ua-blue text-center mb-8">Approval</h2>
      <div class="approval-boxes flex justify-center flex-wrap gap-5">
        <Box2 title="College Dean" @click="visible = true" />
        <Box2 title="Office of Student Affairs" />
        <Box2 title="VPAA Approval" />
        <Box2 title="Funding Needs Reviewed " />
        <Box2 title="Copy Received by:" />
      </div>

      <Modal :visible="visible" />

    </div>
  </div>
</template>

<style scoped>
  .approval-boxes {
    flex: 1 1 calc(33.333% - 20px);
  }

</style>
