<script setup>
import InputText from "primevue/inputtext";
import Select from "primevue/select";
import Textarea from "primevue/textarea";

const props = defineProps({
    form: Object,
    venues: Array,
});

const handleFileUpload = (event, fieldName) => {
    const file = event.target.files[0];
    if (file) {
        props.form[fieldName] = file;
    }
};
</script>

<template>
    <div class="w-3/4 p-4">
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
            <label class="text-2xl">Activity Title</label>
            <InputText type="text" v-model="form.title" />
            <span v-if="form.errors.title" class="text-red-500">
                * {{ form.errors.title }}
            </span>
        </div>

        <div class="flex flex-row gap-4 mb-4">
            <div class="flex flex-col w-2/4">
                <label class="text-2xl">Type of Event</label>
                <Select
                    v-model="form.event_type"
                    editable
                    :options="events"
                    placeholder="Select an Event"
                    disabled
                />
                <span v-if="form.errors.event_type" class="text-red-500">
                    * {{ form.errors.event_type }}
                </span>
            </div>
            <div class="flex flex-col w-2/4">
                <label class="text-2xl">Activity Description</label>
                <Textarea v-model="form.description" rows="5" cols="30" />
                <span v-if="form.errors.description" class="text-red-500">
                    * {{ form.errors.description }}
                </span>
            </div>
        </div>

        <div class="flex mx-auto gap-4 mb-4">
            <div class="flex flex-col w-2/4 justify-center gap-8">
                <div class="flex flex-col">
                    <label class="text-2xl">Start Date</label>
                    
                    <span v-if="form.errors.start_date" class="text-red-500">
                        * {{ form.errors.start_date }}
                    </span>
                </div>

                <div class="flex flex-col">
                    <label class="text-2xl">End Date</label>
                    
                    <span v-if="form.errors.end_date" class="text-red-500">
                        * {{ form.errors.end_date }}
                    </span>
                </div>
            </div>
        </div>

        <div class="flex flex-col mx-auto mb-4">
            <label class="text-2xl">Venue</label>
            <Select
                v-model="form.venue"
                :options="venues.map((venue) => venue.name)"
                placeholder="Select a venue"
                disabled
            />
            <span v-if="form.errors.venue" class="text-red-500">
                * {{ form.errors.venue }}
            </span>
        </div>

        <div class="flex gap-4">
            <div class="flex flex-col w-2/4">
                <label class="text-2xl">Requirements / Resources Needed</label>
                <Textarea
                    v-model="form.requirements_or_resources_needed"
                    disabled
                    rows="5"
                    cols="30"
                />
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
                        >Participants - Department / Program / Grade or Year
                        Level</label
                    >
                    <InputText type="text" v-model="form.participant" />
                    <span v-if="form.errors.participant" class="text-red-500">
                        * {{ form.errors.participant }}
                    </span>
                </div>
                <div class="flex flex-col">
                    <label class="text-2xl">Expected Number of Attendees</label>
                    <InputNumber v-model="form.attendance_count" disabled />
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
                    <input
                        :disabled="form.check_payment_or_cash !== true"
                        type="file"
                        @change="
                            handleFileUpload($event, 'payment_or_cash_file')
                        "
                    />
                </div>
            </div>
        </div>
        <span v-if="form.errors.payment_or_cash_file" class="text-red-500">
            * {{ form.errors.payment_or_cash_file }}
        </span>

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
                    <input
                        :disabled="form.food !== true"
                        type="file"
                        @change="handleFileUpload($event, 'food_file')"
                    />
                </div>
            </div>
        </div>
        <span v-if="form.errors.food_file" class="text-red-500">
            * {{ form.errors.food_file }}
        </span>

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
                    <input
                        :disabled="form.supplies !== true"
                        type="file"
                        @change="handleFileUpload($event, 'supplies_file')"
                    />
                </div>
            </div>
        </div>
        <span v-if="form.errors.supplies_file" class="text-red-500">
            * {{ form.errors.supplies_file }}
        </span>

        <div class="flex mx-auto gap-4 mb-4 text-xl">
            <div
                class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
            >
                Reproduction
            </div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">Reproduction Form</p>
                <div class="flex justify-center">
                    <input
                        :disabled="form.reproduction !== true"
                        type="file"
                        @change="handleFileUpload($event, 'reproduction_file')"
                    />
                </div>
            </div>
        </div>
        <span v-if="form.errors.reproduction_file" class="text-red-500">
            * {{ form.errors.reproduction_file }}
        </span>

        <div class="flex gap-4 text-xl">
            <div
                class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
            >
                Others, specify
            </div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">If applicable:</p>
                <div class="flex justify-center">
                    <input
                        :disabled="form.others !== true"
                        type="file"
                        @change="handleFileUpload($event, 'others_file')"
                    />
                </div>
            </div>
        </div>
        <span v-if="form.errors.others_file" class="text-red-500">
            * {{ form.errors.others_file }}
        </span>
    </div>
</template>

<style scoped></style>
