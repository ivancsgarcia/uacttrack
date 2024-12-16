<script setup>
import FullCalendar from "@fullcalendar/vue3";
import listPlugin from "@fullcalendar/list";
import { holidays, exams } from "../apf/dateAttributes";
import { computed, ref, onMounted } from "vue";

const events = ref([]);

onMounted(async () => {
    try {
        const response = await fetch("/api/events");
        const fetchedEvents = await response.json();
        events.value = fetchedEvents.map((event) => ({
            title: event.title,
            start: event.start_date.replace(" ", "T"),
            end: event.end_date.replace(" ", "T"),
        }));
        console.log(events);
    } catch (error) {
        console.error(error);
    }
});

const calendarOptions = computed(() => ({
    plugins: [listPlugin],
    initialView: "listMonth",
    headerToolbar: {
        left: "prev",
        center: "title",
        right: "next",
    },
    eventSources: [
        {
            events: holidays,
            color: "green",
            textColor: "white",
        },
        {
            events: exams,
            color: "purple",
            textColor: "white",
        },
        {
            events: events.value,
            color: "blue",
            textColor: "white",
        },
    ],
}));
</script>

<template>
    <FullCalendar :options="calendarOptions" />
</template>
