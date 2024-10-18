<script setup>
const props = defineProps({
    form: Object,
});

const emit = defineEmits(["nextStep"]);
</script>

<template>
    <div class="part-one">
        <div class="head">
            <p class="title">
                Identify the funding requirements for your activity.
            </p>
            <div class="bool">Yes</div>
            <div class="bool">No</div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name">Check Payment / Cash</div>
            <!-- <div class="radio">
                <input
                    type="radio"
                    name="cash"
                    value="1"
                    v-model="form.check_payment_or_cash"
                    class=""
                />
            </div>
            <div class="radio">
                <input
                    type="radio"
                    name="cash"
                    value="0"
                    v-model="form.check_payment_or_cash"
                    class=""
                />
            </div> -->
            <div>
                <ToggleSwitch v-model="form.check_payment_or_cash" />
            </div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name">Food</div>
            <!-- <div class="radio">
                <input
                    type="radio"
                    name="food"
                    value="1"
                    v-model="form.food"
                    class=""
                />
            </div>
            <div class="radio">
                <input
                    type="radio"
                    name="food"
                    value="0"
                    v-model="form.food"
                    class=""
                />
            </div> -->
            <div>
                <ToggleSwitch v-model="form.food" />
            </div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name">Supplies</div>
            <!-- <div class="radio">
                <input
                    type="radio"
                    name="supplies"
                    value="1"
                    v-model="form.supplies"
                    class=""
                />
            </div>
            <div class="radio">
                <input
                    type="radio"
                    name="supplies"
                    value="0"
                    v-model="form.supplies"
                    class=""
                />
            </div> -->
            <div>
                <ToggleSwitch v-model="form.supplies" />
            </div>
        </div>

        <div class="flex justify-center items-center gap-5">
            <div class="name">Reproduction</div>
            <!-- <div class="radio">
                <input
                    type="radio"
                    name="reproduction"
                    value="1"
                    v-model="form.reproduction"
                    class=""
                />
            </div>
            <div class="radio">
                <input
                    type="radio"
                    name="reproduction"
                    value="0"
                    v-model="form.reproduction"
                    class=""
                />
            </div> -->
            <div>
                <ToggleSwitch v-model="form.reproduction" />
            </div>
        </div>

        <div class="mx-14">
            <p class="note">
                Please download and complete any additional forms required based
                on the funding requirements you selected, and attach them at the
                end of this form.
            </p>
        </div>

        <div class="btns">
            <!-- class="div-btn" -->
            <button @click="" class="form-btn">Forms</button>

            <!-- class="div-btn bg-ua-blue text-white" -->
            <button @click="emit('nextStep')" class="next-btn">Next</button>
        </div>
    </div>
</template>

<style scoped>
.part-one {
}

.head {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.25rem;
}

.title {
    color: #272f5c;
    text-align: center;
    font-weight: bold;
}

.bool {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #272f5c;
    color: #fff;
}

.name {
    background-color: rgba(39, 47, 92, 0.15);
    display: flex;
    justify-content: center;
    align-items: center;
}

.radio {
    display: flex;
    justify-content: center;
    align-items: center;
}

.note {
    font-size: 1rem;
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

.btns {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.25rem;
}

.form-btn {
    color: #272f5c;
    border: 1px solid black;
    border-radius: 0.5rem;
    padding: 0.5rem;
}

.next-btn {
    color: #fff;
    background-color: #272f5c;
    border: 1px solid #272f5c;
    border-radius: 0.5rem;
    padding: 0.5rem;
}
</style>
