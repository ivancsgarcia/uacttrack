<script setup>
import DatePicker from "primevue/datepicker";

const time = ref();

</script>

<template>
    <div>
        <label for="datepicker-timeonly">
            From Time
        </label>
        <DatePicker id="datepicker-timeonly" v-model="time" timeOnly />
    </div>
</template>
