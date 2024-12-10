<script setup>
import { attrs } from "../apf/dateAttributes";
import { onMounted } from "vue";

const props = defineProps({
    activityForms: Object,
});

onMounted(() => {
    if (props.activityForms?.length > 0) {
        const activityAttrs = props.activityForms
            .filter((apf) => apf.status === "APPROVED")
            .map((apf) => ({
                key: apf.id,
                bar: {
                    style: {
                        backgroundColor: "purple",
                    },
                },
                popover: {
                    label: `${apf.from_time.slice(0, 5)} - ${apf.to_time.slice(
                        0,
                        5
                    )}: ${apf.title} (${apf.venue})`,
                },
                dates: new Date(apf.date), // Make sure apf.date is a valid Date object
            }));

        // Updating the attrs in a reactive way
        attrs.value = [...attrs.value, ...activityAttrs];
    }
});
</script>

<template>
    <div class="bg-gray-300 rounded-lg">
        <VCalendar expanded transparent :attributes="attrs" />
    </div>
</template>

<style scoped></style>
