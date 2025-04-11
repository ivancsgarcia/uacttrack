<script setup>
import { Icon } from "@iconify/vue";

defineProps({
    icon: String,
    type: String,
    name: String,
    id: String,
    modelValue: String,
    placeholder: String,
});

defineEmits(["update:modelValue"]);
</script>

<template>
    <div class="flex rounded-md border bg-white">
        <div class="flex items-center rounded-md p-3">
            <Icon :icon="icon" class="size-6 text-gray-500" />
        </div>
        <div class="w-[1px] bg-gray-500"></div>
        <input
            :type="type"
            :name="name"
            :id="id"
            :value="modelValue"
            @input="(e) => $emit('update:modelValue', e.target.value)"
            :placeholder="placeholder"
            class="w-full rounded-md p-3 text-black focus:outline-none"
        />
    </div>
</template>
