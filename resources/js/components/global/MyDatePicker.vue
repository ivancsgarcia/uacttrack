<script setup>
import { attrs, disabledDates } from "../apf/dateAttributes";
import { ref, watch } from "vue";

// Receive props
const props = defineProps({
    form: Object,
});

// Create a local ref for the date value to format it
const selectedDate = ref(props.form.date);

// Watch for changes in selectedDate and format it before updating `form.date`
watch(selectedDate, (newDate) => {
    if (newDate) {
        // Format date to 'YYYY-MM-DD'
        props.form.date = new Date(newDate).toISOString().split("T")[0];
    }
});

// Keep `selectedDate` in sync if `props.form.date` changes externally
watch(
    () => props.form.date,
    (newDate) => {
        selectedDate.value = newDate;
    }
);
</script>

<template>
    <VDatePicker
        v-model="selectedDate"
        :attributes="attrs"
        :disabled-dates="disabledDates"
        mode="date"
        expanded
    />
</template>
