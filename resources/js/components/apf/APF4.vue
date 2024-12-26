<script setup>
import InputText from "primevue/inputtext";
import Select from "primevue/select";
import Textarea from "primevue/textarea";

const props = defineProps({
    form: Object,
    events: Array,
});
</script>

<template>
    <div class="w-3/4 py-8">
        <div class="flex flex-col mb-4">
            <label class="text-ua-blue text-2xl">Activity Title</label>
            <InputText type="text" v-model="form.title" placeholder="Type Title Name" class="shadow-md" />
            <span v-if="form.errors.title" class="text-red-500">
                * {{ form.errors.title }}
            </span>
        </div>

        <div class="flex flex-col mb-4">
            <label class="text-ua-blue text-2xl">Type of Event</label>
            <Select
                v-model="form.event_type"
                editable
                :options="events"
                placeholder="Type or Select Event Type"
                class="shadow-md"
            />
            <span v-if="form.errors.event_type" class="text-red-500">
                * {{ form.errors.event_type }}
            </span>
        </div>

        <div class="flex flex-col mb-4">
            <label class="text-ua-blue text-2xl">Activity Description</label>
            <Textarea v-model="form.description" placeholder="Write Activity Description..." rows="5" cols="30" class="shadow-md" />
            <span v-if="form.errors.description" class="text-red-500">
                * {{ form.errors.description }}
            </span>
        </div>

        <div class="flex flex-col mb-4">
            <label class="text-ua-blue text-2xl"
                >Requirements / Resources Needed</label
            >
            <Textarea
                v-model="form.requirements_or_resources_needed"
                placeholder="Add Requirements or Resources Needed..."
                rows="5"
                cols="30"
                class="shadow-md"
            />
            <span
                v-if="form.errors.requirements_or_resources_needed"
                class="text-red-500"
            >
                * {{ form.errors.requirements_or_resources_needed }}
            </span>
        </div>
    </div>
</template>

<style scoped></style>
