<template>
        <div>
            <UAHeader />
        </div>
    
        <form @submit.prevent="submitForm" class="w-4/5 mx-auto py-28">
            <!-- PART 1 -->
            <APF1 
                v-if="currentStep === 1"
                :form="form"
                @nextStep="nextStep"
            />

            <!-- PART 2 -->
            <APF2 
                v-if="currentStep === 2"
                :form="form"
                @nextStep="nextStep"
                @previousStep="previousStep"
            />

            <!-- PART 3 -->
            <APF3 
                v-if="currentStep === 3"
                :form="form"
                @previousStep="previousStep"
                @submitForm="submitForm"
            />
        </form>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import APF1 from '../components/apf/APF1.vue';
import APF2 from '../components/apf/APF2.vue';
import APF3 from '../components/apf/APF3.vue';

const currentStep = ref(1)
const form = useForm({
    paymentOrCash: null,
    food: null,
    supplies: null,
    reproduction: null,
    date: null,
    fromTime: null,
    toTime: null,
    numberOfAttendees: null,
    typeOfEvent: null,
    availableVenue: null,
    requirementsOrResourcesNeeded: null,
    activityTitle: null,
    activityDescription: null,
    participant: null,
    paymentOrCashFile: null,
    foodFile: null,
    suppliesFile: null,
    reproductionFile: null,
    othersFile: null,
});

const nextStep = () => {
    if(currentStep.value < 3) {
        currentStep.value++
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

const previousStep = () => {
    if(currentStep.value > 1) {
        currentStep.value--
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

const submitForm = async () => {
    form.processing = true;
    try {
        await form.post(route('activity-form'));
    } catch (error) {
        console.error(error);
    } finally {
        form.processing = false;
    }
}

</script>

<style scoped>

</style>