<script setup>
import ImageUpload from "../global/ImageUpload.vue";

const props = defineProps({
    form: Object,
    venues: Array,
});

const handleFileUpload = (event, fieldName) => {
    const file = event.target.files[0];
    props.form[fieldName] = file;
};
</script>

<template>
    <div class="p-4">
        <h1 class="text-3xl text-center mb-8">Activity Proposal Form</h1>
        <p class="m-auto text-md">
            (Approval Form for In-Campus Activities with corresponding Logistics
            and Funding Requirements)
        </p>
        <p class="m-auto text-md mb-4">
            Note: Deadline of Submission of activity form is three days before
            the activity. Please ensure that the date in the activity form that
            you will generate is correct because
            <span class="font-bold">it cannot be changed.</span>
        </p>

        <div class="flex flex-col mb-4">
            <label class="text-2xl">* Activity Title</label>
            <input
                type="text"
                v-model="form.title"
                class="rounded-xl shadow bg-ua-blue/30 p-2"
            />
            <span v-if="form.errors.title" class="text-red-500">
                * {{ form.errors.title }}
            </span>
        </div>

        <div class="flex flex-row gap-4 mb-4">
            <div class="flex flex-col w-2/4">
                <label class="text-2xl">* Type of Event</label>
                <input
                    type="text"
                    v-model="form.event_type"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                />
                <span v-if="form.errors.event_type" class="text-red-500">
                    * {{ form.errors.event_type }}
                </span>
            </div>
            <div class="flex flex-col w-2/4">
                <label class="text-2xl">* Activity Description</label>
                <textarea
                    v-model="form.description"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                ></textarea>
                <span v-if="form.errors.description" class="text-red-500">
                    * {{ form.errors.description }}
                </span>
            </div>
        </div>

        <div class="flex mx-auto gap-4 mb-4">
            <div class="flex flex-col w-2/4">
                <label class="text-2xl">* Date</label>
                <VDatePicker v-model="form.date" mode="date" expanded />
                <!-- <input
                    type="date"
                    v-model="form.date"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                /> -->
                <span v-if="form.errors.date" class="text-red-500">
                    * {{ form.errors.date }}
                </span>
            </div>

            <div class="flex flex-col w-2/4 justify-center gap-8">
                <div class="flex flex-col">
                    <label class="text-2xl">* From Time</label>
                    <VDatePicker
                        v-model="form.from_time"
                        mode="time"
                        hide-time-header
                        class="shadow"
                    />
                    <!-- <input
                    type="time"
                    v-model="form.from_time"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                /> -->
                    <span v-if="form.errors.from_time" class="text-red-500">
                        * {{ form.errors.from_time }}
                    </span>
                </div>

                <div class="flex flex-col">
                    <label class="text-2xl">* To Time</label>
                    <VDatePicker
                        v-model="form.to_time"
                        mode="time"
                        hide-time-header
                    />
                    <!-- <input
                    type="time"
                    v-model="form.to_time"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                /> -->
                    <span v-if="form.errors.to_time" class="text-red-500">
                        * {{ form.errors.to_time }}
                    </span>
                </div>
            </div>
        </div>

        <div class="flex flex-col mx-auto mb-4">
            <label class="text-2xl">* Venue</label>
            <select
                v-model="form.venue"
                class="rounded-xl shadow bg-ua-blue/30 p-2"
            >
                <option
                    v-for="venue in venues"
                    :key="venue.id"
                    :value="venue.name"
                >
                    {{ venue.name }}
                </option>
            </select>
            <span v-if="form.errors.venue" class="text-red-500">
                * {{ form.errors.venue }}
            </span>
        </div>

        <div class="flex gap-4">
            <div class="flex flex-col w-2/4">
                <label class="text-2xl"
                    >* Requirements / Resources Needed</label
                >
                <textarea
                    v-model="form.requirements_or_resources_needed"
                    class="rounded-xl shadow bg-ua-blue/30 p-2"
                ></textarea>
                <span
                    v-if="form.errors.requirements_or_resources_needed"
                    class="text-red-500"
                >
                    * {{ form.errors.requirements_or_resources_needed }}
                </span>
            </div>
            <div class="w-2/4">
                <div class="flex flex-col mb-4">
                    <label class="text-2xl"
                        >* Participants - Department / Program / Grade or Year
                        Level</label
                    >
                    <input
                        type="text"
                        v-model="form.participant"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                    <span v-if="form.errors.participant" class="text-red-500">
                        * {{ form.errors.participant }}
                    </span>
                </div>
                <div class="flex flex-col">
                    <label class="text-2xl"
                        >* Expected Number of Attendees</label
                    >
                    <input
                        type="number"
                        v-model="form.attendance_count"
                        min="0"
                        max="5000"
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                    <span
                        v-if="form.errors.attendance_count"
                        class="text-red-500"
                    >
                        * {{ form.errors.attendance_count }}
                    </span>
                </div>
            </div>
        </div>

        <div class="bg-black/20 p-4 text-center text-2xl my-8">
            Projected Funding Needs
        </div>

        <div class="flex mb-4">
            <div class="w-2/4 text-center text-2xl">Nature</div>
            <div class="w-2/4 text-center text-2xl">Forms to be Attached</div>
        </div>

        <div class="flex gap-4 mb-4 text-xl">
            <div
                class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
            >
                Check Payment / Cash
            </div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">
                    Funding Request Form (FRF) for P1,000 and above or Petty
                    Cash Form (PCF ) for amount below P1,000.
                </p>
                <div class="flex justify-center">
                    <ImageUpload />
                    <!-- <input
                        :disabled="form.check_payment_or_cash != true"
                        type="file"
                        @change="
                            handleFileUpload($event, 'payment_or_cash_file')
                        "
                    /> -->
                </div>
            </div>
        </div>

        <div class="flex mx-auto gap-4 mb-4 text-xl">
            <div
                class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
            >
                Food
            </div>
            <div
                class="bg-ua-blue/30 w-2/4 flex flex-col justify-center items-center p-2 rounded-md"
            >
                <p class="text-center">Request for Meals (RFM)</p>
                <div class="flex justify-center">
                    <!-- <input
                        :disabled="form.food != true"
                        type="file"
                        @change="handleFileUpload($event, 'food_file')"
                    /> -->
                    <ImageUpload />
                </div>
            </div>
        </div>

        <div class="flex mx-auto gap-4 mb-4 text-xl">
            <div
                class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
            >
                Supplies
            </div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">
                    Requisition Form (RF) for supplies available at RMS or
                    Purchase Requisition (PR) for supplies to be purchased
                </p>
                <div class="flex justify-center">
                    <!-- <input
                        :disabled="form.supplies != true"
                        type="file"
                        @change="handleFileUpload($event, 'supplies_file')"
                    /> -->
                    <ImageUpload />
                </div>
            </div>
        </div>

        <div class="flex mx-auto gap-4 mb-4 text-xl">
            <div
                class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
            >
                Reproduction
            </div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">Reproduction Form</p>
                <div class="flex justify-center">
                    <!-- <input
                        :disabled="form.reproduction != true"
                        type="file"
                        @change="handleFileUpload($event, 'reproduction_file')"
                    /> -->
                    <ImageUpload />
                </div>
            </div>
        </div>

        <div class="flex gap-4 text-xl">
            <div
                class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
            >
                Others, specify
            </div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">If applicable:</p>
                <div class="flex justify-center">
                    <!-- <input
                        :disabled="form.others != true"
                        type="file"
                        @change="handleFileUpload($event, 'others_file')"
                    /> -->
                    <ImageUpload />
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped></style>
