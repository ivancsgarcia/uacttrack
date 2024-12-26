<script setup>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid";
import { caledarHolidays, calendarExams } from "../apf/dateAttributes";
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
    plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
    initialView: "dayGridMonth",
    navLinks: true,
    headerToolbar: {
        left: "prev,today,next",
        center: "title",
        right: "dayGridMonth,timeGridWeek,timeGridDay",
    },
    dateClick: handleDateClick,
    eventSources: [
        {
            events: caledarHolidays,
            color: "green",
            textColor: "white",
        },
        {
            events: calendarExams,
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

function handleDateClick(arg) {
    alert("date click! " + arg.dateStr);
}
</script>

<template>
    <FullCalendar :options="calendarOptions" />
</template>
