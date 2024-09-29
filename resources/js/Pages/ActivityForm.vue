<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import APF1 from '../components/apf/APF1.vue';
import APF2 from '../components/apf/APF2.vue';
import APF3 from '../components/apf/APF3.vue';

const props = defineProps({
    venues: Object,
})

const currentStep = ref(1)
const form = useForm({
    check_payment_or_cash: null,
    food: null,
    supplies: null,
    reproduction: null,
    date: null,
    from_time: null,
    to_time: null,
    attendance_count: null,
    event_type: null,
    venue: null,
    requirements_or_resources_needed: null,
    title: null,
    description: null,
    participant: null,
    payment_or_cash_file: null,
    food_file: null,
    supplies_file: null,
    reproduction_file: null,
    others_file: null,
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
                :venues="props.venues"
            />

            <!-- PART 3 -->
            <APF3 
                v-if="currentStep === 3"
                :form="form"
                @previousStep="previousStep"
                @submitForm="submitForm"
                :venues="props.venues"
            />
        </form>
</template>
