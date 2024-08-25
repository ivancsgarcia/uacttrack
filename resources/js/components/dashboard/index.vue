<script setup>
import { ref } from 'vue';
import Box from './Box.vue';
import Box2 from './Box2.vue';
import DeanModal from './DeanModal.vue';

const showModal = ref(false);
</script>

<template>
  <div class="wrapper">
    <UAHeader class="header"></UAHeader>
  </div>

  <div class="page">
      <SideBar></SideBar>

    <div class="content">
        <div class="one">
          <Account class="account" name="SSITE"></Account>
          <div class="right">
            <SearchBar></SearchBar>
            <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
            <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
          </div>
        </div>

        <div class="flex">
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

        <div class="horizontal-line"></div>

        <h2>Approval</h2>

        <div class="flex">
          <Box2 title="College Dean (For RSO)"  />
          <button @click="showModal = true"> hi</button>
          <Box2 title="OFFICE OF STUDENT AFFAIRS (For RSO)" />
          <Box2 title="VPAA Approval" />
          <Box2 title="Funding Needs Reviewed " />
          <Box2 title="Copy Received by:"/>
        </div>

    </div>
  </div>

  <DeanModal v-if="showModal" :show="showModal"  />

</template>

<style scoped>
  .wrapper {
        padding-bottom: 8vh;
      }

  .page {
    display: flex;
  }

  .content {
    margin-left: 15vw;
  }

  .one {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 20px 50px 50px;
  }

  .right {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 20px;
  }

  .flex {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
  }

  .horizontal-line {
    height: 2px;
    background-color: #000;
    margin: 50px auto;
  }

  h2 {
    margin-left: 30px;
    margin-bottom: 30px;
    font-size: 2rem;
  }
</style>
