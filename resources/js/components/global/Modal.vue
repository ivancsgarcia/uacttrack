<script setup>
import { ref } from 'vue';

const props = defineProps({
  title: String,
  headers: Array,
  data: Array,
});

const isOpen = ref(false);

const openModal = () => {
  isOpen.value = true;
};

const closeModal = () => {
  isOpen.value = false;
};

defineExpose({ openModal, closeModal });
</script>

<template>
  <div v-if="isOpen" @click="closeModal"  class="modal-overlay">
    <div @click.stop class="modal-content">
      <div class="flex justify-between items-center mb-4">
        <h2>{{ title }}</h2>
        <button @click="closeModal" class="close-button">X</button>
    </div>
      <table class="modal-table">
        <thead>
          <tr>
            <th v-for="(header, index) in headers" :key="index">{{ header }}</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(row, index) in data" :key="index">
            <td v-for="(cell, cellIndex) in row" :key="cellIndex">{{ cell }}</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<style scoped>
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 1000;
}

.modal-content {
  background: white;
  padding: 20px;
  border-radius: 8px;
  width: 80%;
  max-width: 600px;
}

.close-button {
  /* position: absolute; */
  top: 10px;
  right: 10px;
  background: none;
  border: none;
  font-size: 1.5rem;
  cursor: pointer;
}

.modal-table {
  width: 100%;
  border-collapse: collapse;
}

.modal-table th,
.modal-table td {
  border: 1px solid #ddd;
  padding: 8px;
}

.modal-table th {
  background-color: #f2f2f2;
}
</style>