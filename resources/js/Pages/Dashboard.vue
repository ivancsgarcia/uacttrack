<script setup>
import Box from '../components/dashboard/Box.vue';
import Box2 from '../components/dashboard/Box2.vue';

</script>

<template>
  <div class="wrapper">
    <UAHeader />
  </div>

  <div class="flex">
      <SideMenu></SideMenu>

    <div class="content">
        <div class="one flex justify-between items-center">
          <Account class="account" name="SSITE"></Account>
          <div class="flex justify-center items-center gap-5">
            <SearchBar></SearchBar>
            <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
            <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
          </div>
        </div>

        <div class="flex justify-center flex-wrap gap-5">
          <router-link to="">
            <Box title="Submitted" />
          </router-link>
          <router-link to="">
            <Box title="Approved" />
          </router-link>
          <router-link to="">
            <Box title="Rejected" />
          </router-link>
        </div>

        <div class="horizontal-line h-0.5 bg-black mt-14 mb-10"></div>

        <h2 class="text-3xl">Approval</h2>

        <div class="approval-boxes flex justify-center flex-wrap gap-5">
          <Box2 title="College Dean (For RSO)"  />
          <Box2 title="OFFICE OF STUDENT AFFAIRS (For RSO)" />
          <Box2 title="VPAA Approval" />
          <Box2 title="Funding Needs Reviewed " />
          <Box2 title="Copy Received by:"/>
        </div>

    </div>
  </div>

</template>

<style scoped>
  .wrapper {
        padding-bottom: 8vh;
      }

  .content {
    margin-left: 15vw;
  }

  .one {
    margin: 20px 50px 50px;
  }

  h2 {
    margin-left: 30px;
    margin-bottom: 30px;
  }

  .approval-boxes {
    flex: 1 1 calc(33.333% - 20px);
  }
</style>
