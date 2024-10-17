<script setup>
import DatePicker from "primevue/datepicker";

</script>

<template>
    <div class="card">
        <label>Date</label>
        <DatePicker
            v-model="date"
            dateFormat="dd/mm/yy"
            showIcon
            iconDisplay="input"
            
        />
    </div>
</template>

<style scoped>
.card {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>
