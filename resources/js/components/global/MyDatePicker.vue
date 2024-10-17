<script>
import DatePicker from "primevue/datepicker";
import { ref, watch } from "vue";

const date = ref();
const formattedDate = ref("");

watch(date, (newDate) => {
    if (newDate) {
        const month = String(newDate.getMonth() + 1).padStart(2, "0"); // Month is 0-indexed
        const day = String(newDate.getDate()).padStart(2, "0");
        const year = newDate.getFullYear();
        formattedDate.value = `${month}/${day}/${year}`;
        form.date = formattedDate.value; // Set the formatted date in the form
    }
});
</script>

<template>
    <DatePicker
        v-model="date"
        modelValue="Date"
        showIcon
        iconDisplay="input"
        dateFormat="mm/dd/yy"
        showButtonBar
    />
</template>

<style scoped>
.card {
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>
