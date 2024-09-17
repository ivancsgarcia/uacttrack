<template>
  <div class="app flex pt-16">
    <UAHeader />
    <SideMenu/>

    <div class="main-content w-screen ml-64 p-5">
      <div class="flex justify-between items-center mt-5 mx-12 mb-12">
          <Account class="account" :name="fullName" /> 

          <div class="flex justify-center items-center gap-5">
              <SearchBar></SearchBar>
              <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
              <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
          </div>
      </div>

        <div class="flex justify-center flex-wrap gap-5 mt-5 mx-12 mb-12">
          <Link :href="route('submitted-form')">
            <Box title="Submitted" />
          </Link>
          <Link :href="route('approved-form')">
            <Box title="Approved" />
          </Link>
          <Link :href="route('rejected-form')">
            <Box title="Rejected" />
          </Link>
        </div>

        <div class="horizontal-line h-0.5 bg-black mt-14 mb-10"></div>

        <h2 class="text-3xl">Approval</h2>
        <div class="approval-boxes flex justify-center flex-wrap gap-5">
          <Box2 title="College Dean (For RSO)" @click="openDialog"  />
          <Box2 title="OFFICE OF STUDENT AFFAIRS (For RSO)" />
          <Box2 title="VPAA Approval" />
          <Box2 title="Funding Needs Reviewed " />
          <Box2 title="Copy Received by:"/>
        </div>

        <dialog ref="dialogRef" class="modal">
          <div class="modal-box">
            <h3 class="text-lg font-bold">Hello!</h3>
            <p class="py-4">Press ESC key or click the button below to close</p>
            <div class="modal-action">
              <form method="dialog">
                <!-- if there is a button in form, it will close the modal -->
                <button class="btn">Close</button>
              </form>
            </div>
          </div>
      </dialog>

    </div>
  </div>
  
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import Box from '../components/dashboard/Box.vue';
import Box2 from '../components/dashboard/Box2.vue';
import { Link } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
const fullName = `${user.value.firstName} ${user.value.lastName}`;

const dialogRef = ref(null);

// Function to open the dialog
const openDialog = () => {
  dialogRef.value.showModal(); // Opens the dialog as a modal
};

// Function to close the dialog
const closeDialog = () => {
  dialogRef.value.close(); // Closes the dialog
};
</script>

<style scoped>

  .main-content {
    min-height: calc(100vh - 60px);
  }

  .approval-boxes {
    flex: 1 1 calc(33.333% - 20px);
  }

  .modal {
  position: fixed;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  border: none;
  padding: 0;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  max-width: 90%;
  background-color: white;
}

.modal-box {
  padding: 20px;
}

.modal-action {
  text-align: center;
}
</style>
