<script setup>
import { ref } from 'vue';
import { addDays } from "date-fns";
import { exams, holidays, disabledDates } from '../apf/dateAttributes';

const props = defineProps({date: String}); 

const markers =ref([...exams, ...holidays]);

</script>

<template>
    <VueDatePicker
        v-model="props.date"
        range
        partial-flow
        inline
        auto-apply
        :timezone="{ timezone: 'UTC' }"
        :range="{ noDisabledRange: true }"
        :flow="['calendar', 'time']"
        :min-date="addDays(new Date(), 7)"
        :disabled-week-days="[0]"
        :disabled-dates="disabledDates"
        :markers="markers"
    ></VueDatePicker>
</template>
