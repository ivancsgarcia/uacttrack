<script setup>
    const props = defineProps({
        form: Object,
    })

    const emit = defineEmits(['nextStep'])
</script>

<template>
    <div class="part-one w-full space-y-4">
        <div class="flex justify-center items-center gap-5">
            <p class="text-ua-blue text-center font-bold text-3xl w-2/4">Identify the funding requirements for your activity.</p>
            <div class="bool flex justify-center items-center bg-ua-blue text-white text-3xl w-1/5 h-20 shadow-xl">Yes</div>
            <div class="bool flex justify-center items-center bg-ua-blue text-white text-3xl w-1/5 h-20 shadow-xl">No</div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Check Payment / Cash</div>
            <div class="radio radio1 shadow-xl"><input type="radio" name="cash" value="1" v-model="form.check_payment_or_cash" class="w-8 h-8 mx-2 scale-150"/></div>
            <div class="radio radio2 shadow-xl"><input type="radio" name="cash" value="0" v-model="form.check_payment_or_cash" class="w-8 h-8 mx-2 scale-150"/></div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Food</div>
            <div class="radio radio1 shadow-xl"><input type="radio" name="food" value="1" v-model="form.food" class="w-8 h-8 mx-2 scale-150"/></div>
            <div class="radio radio2 shadow-xl"><input type="radio" name="food" value="0" v-model="form.food" class="w-8 h-8 mx-2 scale-150"/></div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Supplies</div>
            <div class="radio radio1 shadow-xl"><input type="radio" name="supplies" value="1" v-model="form.supplies" class="w-8 h-8 mx-2 scale-150"/></div>
            <div class="radio radio2 shadow-xl"><input type="radio" name="supplies" value="0" v-model="form.supplies" class="w-8 h-8 mx-2 scale-150"/></div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Reproduction</div>
            <div class="radio radio1 shadow-xl"><input type="radio" name="reproduction" value="1" v-model="form.reproduction" class="w-8 h-8 mx-2 scale-150"/></div>
            <div class="radio radio2 shadow-xl"><input type="radio" name="reproduction" value="0" v-model="form.reproduction" class="w-8 h-8 mx-2 scale-150"/></div>
        </div>

        <div class="mx-14">
            <p class="text-lg">Please download and complete any additional forms required based on the funding requirements you selected, and attach them at the end of this form.</p>
        </div>

        <div class="flex justify-center items-center gap-5">
            <!-- class="div-btn" -->
            <button @click="" class="border border-black rounded-xl text-ua-blue text-2xl px-12 py-4">Forms</button>

            <!-- class="div-btn bg-ua-blue text-white" -->
            <button @click="emit('nextStep')" class="border border-ua-blue rounded-xl bg-ua-blue text-white text-2xl px-12 py-4">Next</button>
        </div>
    </div>
</template>

<style scoped>
    .name {
        background-color: rgba(39, 47, 92, 0.15);
    }

    .radio {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 20%;
        height: 5rem;
    }

    .radio1 {
        background-color: rgba(39, 47, 92, 0.7);
    }

    .radio2 {
        background-color: rgba(39, 47, 92, 0.5);
    }

    .div-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 50px;
        border-radius: 20px;
        border: 1px solid black;
        font-size: 1.5rem;
    }
</style>
