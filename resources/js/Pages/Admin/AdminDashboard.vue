<script setup>
import Box from '../../components/dashboard/Box.vue';
import Box2 from '../../components/dashboard/Box2.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';
import AdminSideMenu from '../../components/global/AdminSideMenu.vue';

const modal = ref(null)

const openModal = () => {
  modal.value.openModal()
}

// const closeModal = () => {
//   modal.value.closeModal()
// }

</script>

<template>
    <div class="app flex pt-16">
      <UAHeader />
      <AdminSideMenu/>
  
      <div class="main-content w-screen ml-64 p-5">
        <div class="flex justify-between items-center mt-5 mx-12 mb-4">
            <Account class="account" /> 
  
            <div class="flex justify-center items-center gap-5">
                <SearchBar></SearchBar>
                <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
            </div>
        </div>

        <div class="h-0.5 bg-ua-blue mb-8"></div>
        
        <h1 class="text-center text-4xl mb-4 text-ua-blue">
          Approved Activity Proposal Form
        </h1>

        <table class="w-full border-separate border-spacing-4">
          <thead>
            <tr class="bg-ua-blue text-white h-20">
              <th class="w-1/5 border">Transaction Number</th>
              <th class="w-1/5 border">Date</th>
              <th>Activity Proposal Form</th>
              <th class="w-1/5 border">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr class="text-center h-20">
              <td class="bg-ua-gray text-ua-blue">01</td>
              <td class="bg-ua-gray text-ua-blue">01/01/2000</td>
              <td class="bg-ua-gray text-ua-blue">My APF</td>
              <td class="bg-ua-gray text-ua-blue p-0">
                <select name="" id="" class="w-full h-20 bg-ua-gray p-2">
                  <option value="" selected disabled>Pending</option>
                  <option value="Approved">Approved</option>
                  <option value="Rejected">Rejected</option>
                  <option value="Revisions">For Revisions</option>
              </select>
            </td>
            </tr>
          </tbody>
        </table>
  
      </div>
    </div>

  </template>
  
  <style scoped>
  
    /* .main-content {
      min-height: calc(100vh - 64px);
    } */
  
    .approval-boxes {
      flex: 1 1 calc(33.333% - 20px);
    }
  </style>
  