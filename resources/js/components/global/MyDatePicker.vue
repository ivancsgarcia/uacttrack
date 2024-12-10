<script setup>
import { attrs, disabledDates } from "../apf/dateAttributes";
import { ref, watch } from "vue";

const props = defineProps({
    form: Object,
});

const masks = ref({
  modelValue: 'YYYY-MM-DD',
});

</script>

<template>
    <VDatePicker
        v-model="form.date"
        :attributes="attrs"
        :disabled-dates="disabledDates"
        mode="date"
        :masks="masks"
        expanded
    />
</template>
