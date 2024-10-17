<script setup>
import ToggleSwitch from "primevue/toggleswitch";
import { ref } from "vue";

const checked = ref(false);

// Define props for v-model compatibility
const props = defineProps({
    modelValue: {
        type: Number,
        required: true,
    },
});

// Emit the updated value back to the parent
const emit = defineEmits(["update:modelValue"]);

// Watch for changes in modelValue and emit it back
const updateValue = (value) => {
    emit("update:modelValue", value);
};
</script>

<template>
    <div class="card">
        <ToggleSwitch
            :model-value="modelValue"
            @update:model-value="updateValue"
            onLabel="1"
            offLabel="0"
        />
    </div>
</template>

<style scoped>
.card {
    display: flex;
    justify-content: center;
}
</style>
