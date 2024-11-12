<script setup>
const props = defineProps({
    form: Object,
});

const emit = defineEmits(["nextStep"]);
</script>

<template>
    <div class="p-4 text-xl">
        <div class="flex justify-center items-center gap-4 mb-4">
            <p class="w-2/4 p-2 text-center text-ua-blue">
                Identify the funding requirements for your activity.
            </p>
            <div class="w-1/4 bg-ua-blue shadow-lg p-4 text-center text-white">
                Yes or No
            </div>
        </div>

        <div class="flex justify-center text-center mb-4 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-lg p-2">
                Check Payment / Cash
            </div>
            <div class="w-1/4 bg-ua-blue shadow-lg p-2">
                <ToggleSwitch
                    v-model="form.check_payment_or_cash"
                    :pt="{
                        slider: {
                            class: {
                                '!bg-ua-yellow': form.check_payment_or_cash,
                            },
                        },
                    }"
                />
            </div>
        </div>

        <div class="flex justify-center text-center mb-4 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-lg p-2">Food</div>
            <div class="w-1/4 bg-ua-blue shadow-lg p-2">
                <ToggleSwitch v-model="form.food" :pt="{
                        slider: {
                            class: {
                                '!bg-ua-yellow': form.food,
                            },
                        },
                    }" />
            </div>
        </div>

        <div class="flex justify-center text-center mb-4 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-lg p-2">Supplies</div>
            <div class="w-1/4 bg-ua-blue shadow-lg p-2">
                <ToggleSwitch v-model="form.supplies" :pt="{
                        slider: {
                            class: {
                                '!bg-ua-yellow': form.supplies,
                            },
                        },
                    }" />
            </div>
        </div>

        <div class="flex justify-center text-center mb-4 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-lg p-2">Reproduction</div>

            <div class="w-1/4 bg-ua-blue shadow-lg p-2">
                <ToggleSwitch v-model="form.reproduction" :pt="{
                        slider: {
                            class: {
                                '!bg-ua-yellow': form.reproduction,
                            },
                        },
                    }" />
            </div>
        </div>

        <div class="flex justify-center text-center mb-4 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-lg p-2">Others</div>

            <div class="w-1/4 bg-ua-blue shadow-lg p-2">
                <ToggleSwitch v-model="form.others" :pt="{
                        slider: {
                            class: {
                                '!bg-ua-yellow': form.others,
                            },
                        },
                    }" />
            </div>
        </div>

        <div class="mx-14 mt-4">
            <p class="text-base">
                Please download and complete any additional forms required based
                on the funding requirements you selected, and attach them at the
                end of this form.
            </p>
        </div>
    </div>
</template>

<style scoped></style>
