<script setup>
import { attrs, disabledDates } from '../apf/dateAttributes';

const props = defineProps({
    form: Object,
});
</script>

<template>
    <VDatePicker v-model="form.date" :attributes="attrs" :disabled-dates="disabledDates" mode="date" expanded />
</template>
