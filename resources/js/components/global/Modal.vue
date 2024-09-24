<template>
    <div v-if="isOpen" @click="closeModal" class="modal-overlay">
      <div @click.stop class="modal-content">
        <header class="modal-header">
            <button @click="closeModal" class="modal-close">X</button>
        </header>
        <section class="modal-body">
            <table class="border border-ua-blue text-center">
                <thead class="bg-ua-blue text-white">
                    <tr>
                        <th>Transaction Number</th>
                        <th class="w-3/5">Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Whole Name</td>
                        <td>Pending</td>
                    </tr>
                </tbody>
            </table>
        </section>
        <footer class="modal-footer">
            <button @click="closeModal" class="modal-close">Close</button>
        </footer>
      </div>
    </div>
  </template>
  
  <script setup>
  import { ref } from 'vue'
  
  const isOpen = ref(false)
  
  const openModal = () => {
    isOpen.value = true
  }
  
  const closeModal = () => {
    isOpen.value = false
  }
  
  defineExpose({
    openModal,
    closeModal
  })
  </script>
  
  <style scoped>
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    position: relative;
  }
  
  .modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  border-bottom: 1px solid #ddd;
  padding-bottom: 10px;
}

.modal-body {
  margin: 20px 0;
  padding: 20px;
}

  .modal-close {
  /* position: absolute; */
  top: 10px;
  right: 10px;
  cursor: pointer;
}

.modal-footer {
  display: flex;
  justify-content: flex-end;
  gap: 10px;
}

  </style>