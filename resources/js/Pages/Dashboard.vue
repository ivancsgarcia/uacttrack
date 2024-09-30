<script setup>
import Box from '../components/dashboard/Box.vue';
import Box2 from '../components/dashboard/Box2.vue';
import { Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};

const modal = ref(null);
const modalTitle = ref('');
const modalHeaders = ref([]);
const modalData = ref([]);

const headers = ['Column 1', 'Column 2', 'Column 3'];
const collegeDeanData = [
  ['Data 1', 'Data 2', 'Data 3'],
  ['Data 4', 'Data 5', 'Data 6'],
];
const studentAffairsData = [
  ['Data 7', 'Data 8', 'Data 9'],
  ['Data 10', 'Data 11', 'Data 12'],
];
const vpaaData = [
  ['Data 13', 'Data 14', 'Data 15'],
  ['Data 16', 'Data 17', 'Data 18'],
];
const fundingNeedsData = [
  ['Data 19', 'Data 20', 'Data 21'],
  ['Data 22', 'Data 23', 'Data 24'],
];
const copyReceivedData = [
  ['Data 25', 'Data 26', 'Data 27'],
  ['Data 28', 'Data 29', 'Data 30'],
];

const openModal = ({ title, headers, data }) => {
  modalTitle.value = title;
  modalHeaders.value = headers;
  modalData.value = data;
  modal.value.openModal();
};

</script>

<template>
  <div class="app flex pt-16">
    <UAHeader />
    <SideMenu/>

    <div class="main-content w-screen ml-64 p-5">
      <div class="flex justify-between items-center mt-5 mx-12 mb-4">
          <Account class="account" /> 

          <div class="flex justify-center items-center gap-5">
            <button @click="toggleMenu" class="menu-button md:hidden">
              <font-awesome-icon :icon="['fas', 'bars']" size="2xl" />
            </button>
            <div :class="{'hidden': !isMenuOpen, 'flex': isMenuOpen}" class="menu-icons flex-col md:flex-row md:flex gap-5">
              <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
              <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
            </div>
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
        <Box2 title="College Dean (For RSO)" @openModal="openModal" :headers="headers" :data="collegeDeanData" />
        <Box2 title="OFFICE OF STUDENT AFFAIRS (For RSO)" @openModal="openModal" :headers="headers" :data="studentAffairsData" />
        <Box2 title="VPAA Approval" @openModal="openModal" :headers="headers" :data="vpaaData" />
        <Box2 title="Funding Needs Reviewed " @openModal="openModal" :headers="headers" :data="fundingNeedsData" />
        <Box2 title="Copy Received by:" @openModal="openModal" :headers="headers" :data="copyReceivedData" />
      </div>

      <Modal ref="modal" :title="modalTitle" :headers="modalHeaders" :data="modalData" />

    </div>
  </div>
</template>

<style scoped>
  .approval-boxes {
    flex: 1 1 calc(33.333% - 20px);
  }

  .menu-button {
  display: none;
}

.menu-icons {
  display: none;
}

@media (max-width: 768px) {
  .menu-button {
    display: block;
  }

  .menu-icons {
    display: none;
  }
}
</style>
