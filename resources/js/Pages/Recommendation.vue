<template>
  <div class="app flex pt-16">
    <UAHeader />
    <SideMenu/>

    <div class="main-content w-screen ml-64 p-5">
        <div class="flex justify-between items-center mt-5 mx-12 mb-12">
          <Account class="account" /> 

          <div class="flex justify-center items-center gap-5">
            <SearchBar></SearchBar>
            <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
            <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
          </div>
        </div>

        <div class="flex justify-center flex-wrap gap-5 boxes">
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
        </div>

    </div>
  </div>
</template>

<script setup>
import Box from '../components/recommendation/Box.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
const fullName = `${user.value.firstName} ${user.value.lastName}`;

</script>

<style scoped>
  .main-content {
    min-height: calc(100vh - 64px);
  }

  .boxes {
    flex: 1 1 calc(33.333% - 20px);
  }

</style>