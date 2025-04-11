<script>
defineProps({
    type: String,
    name: String,
    id: String,
    modelValue: String,
    placeholder: String,
});
</script>

<template>
    <input
        :type="type"
        :name="name"
        :id="id"
        :value="modelValue"
        @input="(e) => $emit('update:modelValue', e.target.value)"
        :placeholder="placeholder"
        class="w-full rounded-md p-3 text-black focus:outline-none"
    />
</template>
