<script setup>
import { ref, watch } from "vue";

const props = defineProps({
    form: Object,
});

const emit = defineEmits(["updateForm"]);

// const localForm = reactive({ ...props.form });
const check_payment_or_cash = ref(false);
const food = ref(false);
const supplies = ref(false);
const reproduction = ref(false);
const others = ref(false);

watch(
    [check_payment_or_cash, food, supplies, reproduction, others],
    ([
        newCheck_payment_or_cash,
        newFood,
        newSupplies,
        newReproduction,
        newOthers,
    ]) => {
        if (newCheck_payment_or_cash === false) {
            emit("updateForm", { payment_or_cash_file: null });
        }
        if (newFood === false) {
            emit("updateForm", { food_file: null });
        }
        if (newSupplies === false) {
            emit("updateForm", { supplies_file: null });
        }
        if (newReproduction === false) {
            emit("updateForm", { reproduction_file: null });
        }
        if (newOthers === false) {
            emit("updateForm", { others_file: null });
        }
    }
);

const handleFileUpload = (event, fieldName) => {
    const file = event.files[0];
    if (file) {
        props.form[fieldName] = file;
    }
};
</script>

<template>
    <div class="w-3/4 py-8 text-xl">
        <div class="flex justify-center items-center gap-4 mb-4">
            <p class="w-2/4 p-2 text-center text-ua-blue">
                Identify the funding requirements for your activity.
            </p>
            <div class="w-1/4 bg-ua-blue p-4 text-center text-white">
                Yes or No
            </div>
        </div>

        <!-- Check Payment / Cash -->
        <div class="flex justify-center text-center mb-2 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-md p-2">
                Check Payment / Cash
            </div>
            <div class="w-1/4 bg-ua-blue shadow-md p-2">
                <ToggleSwitch v-model="check_payment_or_cash" />
            </div>
        </div>
        <div
            v-show="check_payment_or_cash"
            class="w-3/4 mx-auto border-2 border-ua-blue rounded-md p-4 mb-4"
        >
            <p class="text-ua-blue text-center">
                Funding Request Form (FRF) for P1,000 and above or Petty Cash
                Form (PCF ) for amount below P1,000.
            </p>
            <FileUpload
                @select="handleFileUpload($event, 'payment_or_cash_file')"
                mode="basic"
            />
        </div>
        <span v-if="form.errors.payment_or_cash_file" class="text-red-500">
            * {{ form.errors.payment_or_cash_file }}
        </span>

        <!-- Food -->
        <div class="flex justify-center text-center mb-2 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-md p-2">Food</div>
            <div class="w-1/4 bg-ua-blue shadow-md p-2">
                <ToggleSwitch v-model="food" />
            </div>
        </div>
        <div
            v-show="food"
            class="w-3/4 mx-auto border-2 border-ua-blue rounded-md p-4 mb-4"
        >
            <p class="text-ua-blue text-center">Request for Meals (RFM)</p>
            <div class="flex justify-center">
                <input
                    :disabled="food !== true"
                    type="file"
                    @change="handleFileUpload($event, 'food_file')"
                    class="text-ua-blue"
                />
            </div>
        </div>
        <span v-if="form.errors.food_file" class="text-red-500">
            * {{ form.errors.food_file }}
        </span>

        <!-- Supplies -->
        <div class="flex justify-center text-center mb-2 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-md p-2">Supplies</div>
            <div class="w-1/4 bg-ua-blue shadow-md p-2">
                <ToggleSwitch v-model="supplies" />
            </div>
        </div>
        <div
            v-show="supplies"
            class="w-3/4 mx-auto border-2 border-ua-blue rounded-md p-4 mb-4"
        >
            <p class="text-ua-blue text-center">
                Requisition Form (RF) for supplies available at RMS or Purchase
                Requisition (PR) for supplies to be purchased
            </p>
            <div class="flex justify-center">
                <input
                    :disabled="supplies !== true"
                    type="file"
                    @change="handleFileUpload($event, 'supplies_file')"
                    class="text-ua-blue"
                />
            </div>
        </div>
        <span v-if="form.errors.supplies_file" class="text-red-500">
            * {{ form.errors.supplies_file }}
        </span>

        <!-- Reproduction -->
        <div class="flex justify-center text-center mb-2 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-md p-2">Reproduction</div>

            <div class="w-1/4 bg-ua-blue shadow-md p-2">
                <ToggleSwitch v-model="reproduction" />
            </div>
        </div>
        <div
            v-show="reproduction"
            class="w-3/4 mx-auto border-2 border-ua-blue rounded-md p-4 mb-4"
        >
            <p class="text-ua-blue text-center">Reproduction Form</p>
            <div class="flex justify-center">
                <input
                    :disabled="reproduction !== true"
                    type="file"
                    @change="handleFileUpload($event, 'reproduction_file')"
                    class="text-ua-blue"
                />
            </div>
        </div>
        <span v-if="form.errors.reproduction_file" class="text-red-500">
            * {{ form.errors.reproduction_file }}
        </span>

        <!-- Others -->
        <div class="flex justify-center text-center mb-2 gap-4">
            <div class="w-2/4 bg-slate-200 shadow-md p-2">Others</div>

            <div class="w-1/4 bg-ua-blue shadow-md p-2">
                <ToggleSwitch v-model="others" />
            </div>
        </div>
        <div
            v-show="others"
            class="w-3/4 mx-auto border-2 border-ua-blue rounded-md p-4 mb-4"
        >
            <p class="text-ua-blue text-center">If applicable:</p>
            <div class="flex justify-center">
                <input
                    :disabled="others !== true"
                    type="file"
                    @change="handleFileUpload($event, 'others_file')"
                    class="text-ua-blue"
                />
            </div>
        </div>
        <span v-if="form.errors.others_file" class="text-red-500">
            * {{ form.errors.others_file }}
        </span>

        <div class="mx-14 mt-4">
            <p class="text-base">
                Please download and complete any additional forms required based
                on the funding requirements you selected, and attach them at the
                end of this form.
            </p>
        </div>
    </div>
</template>
