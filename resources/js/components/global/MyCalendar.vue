<script setup>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import { ref, reactive } from "vue";

const fullCalendar = ref(null);

const calendarOptions = {
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: "dayGridMonth",
};
</script>

<template>
    <div>
        <FullCalendar ref="fullCalendar" :options="calendarOptions" />
    </div>
</template>

<style scoped>

</style>
