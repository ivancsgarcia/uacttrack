<template>
    <div class="part-three w-full">
            <h1 class="text-5xl text-ua-blue text-center mb-8">Activity Proposal Form</h1>
            <p class="m-auto text-lg text-ua-blue">(Approval Form for In-Campus Activities with corresponding Logistics and Funding Requirements)</p>
            <p class="m-auto text-lg text-ua-blue mb-4">Note: Deadline of Submission of activity form is three days before the activity. Please ensure that the date in the activity form that you will generate is correct because <span class="font-bold">it cannot be changed.</span></p>
        
            <div class="flex flex-col mb-4">
                <label for="" class="text-ua-blue text-3xl">Activity Title</label>
                <input type="text" v-model="form.activityTitle" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4">
            </div>

            <div class="flex flex-row mx-auto mb-4 gap-10">
                <div class="flex flex-col w-2/4">
                    <label for="" class="text-ua-blue text-3xl">Type of Event</label>
                    <input type="text" v-model="form.typeOfEvent" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4">
                </div>
                <div class="flex flex-col w-2/4">
                    <label for="" class="text-ua-blue text-3xl">Activity Description</label>
                    <textarea name="" id="" v-model="form.activityDescription" class="border-2 rounded-md bg-ua-blue/30 h-40 text-2xl p-4"></textarea>
                </div>
            </div>

            <div class="flex mx-auto mb-4 gap-10">
                <div class="flex flex-col w-2/4">
                    <label for="" class="text-ua-blue text-3xl">Date</label>
                    <input type="date" name="" id="" v-model="form.date" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4">
                </div>
                <div class="flex flex-col w-1/4">
                    <label for="" class="text-ua-blue text-3xl">From Time</label>
                    <input type="time" name="" id="" v-model="form.fromTime" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4">
                </div>
                <div class="flex flex-col w-1/4">
                    <label for="" class="text-ua-blue text-3xl">To Time</label>
                    <input type="time" name="" id="" v-model="form.toTime" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4">
                </div>
            </div>

            <div class="flex flex-col mx-auto mb-4">
                <label for="" class="text-ua-blue text-3xl">Venue</label>
                <input type="text" name="" id="" v-model="form.availableVenue" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl p-4">
            </div>

            <div class="flex mx-auto mb-8 gap-10">
                <div class="flex flex-col w-2/4">
                    <label for="" class="text-ua-blue text-3xl">Requirements / Resources Needed</label>
                    <textarea name="" id="" v-model="form.requirementsOrResourcesNeeded" class="border-2 rounded-md bg-ua-blue/30 h-full p-4 text-2xl"></textarea>
                </div>
                <div class="w-2/4">
                    <div class="flex flex-col mb-4">
                        <label for="" class="text-ua-blue text-3xl">Participants - Department / Program / Grade or Year Level</label>
                        <input type="text" name="" id="" v-model="form.participant" class="border-2 rounded-md bg-ua-blue/30 h-20 p-4 text-2xl">
                    </div>
                    <div class="flex flex-col">
                        <label for="" class="text-ua-blue text-3xl">Expected Number of Attendees</label>
                        <input type="number" name="" id="" v-model="form.numberOfAttendees" class="border-2 rounded-md bg-ua-blue/30 h-20 p-4 text-2xl">
                    </div>
                </div>
            </div>

            <div class="bg-black/20 text-ua-blue p-4 text-center text-3xl mb-4">
                Projected Funding Needs
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4">
                <div class="w-2/4 text-center p-2 text-ua-blue text-3xl">Nature</div>
                <div class="w-2/4 text-center p-2 text-ua-blue text-3xl">Forms to be Attached</div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Check Payment / Cash</div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">Funding Request Form (FRF) for P1,000 and above or Petty Cash Form (PCF
                        ) for amount below P1,000.</p>
                    <div class="flex justify-center">
                        <input type="file" @change="handleFileUpload($event, 'paymentOrCashFile')" >
                    </div>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Food</div>
                <div class="bg-ua-blue/30 w-2/4 flex flex-col justify-center items-center p-2 rounded-md">
                    <p class="text-center">Request for Meals (RFM)</p>
                    <div class="flex justify-center">
                        <input type="file" @change="handleFileUpload($event, 'foodFile')" >
                        <!-- <p>{{ form.errors.paymentOrCashFile }}</p> -->
                    </div>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Supplies</div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">Requisition Form (RF) for supplies available at RMS or Purchase Requisition (PR) for supplies to be purchased</p>
                    <div class="flex justify-center">
                        <input type="file" @change="handleFileUpload($event, 'suppliesFile')" >
                        <!-- <p>{{ form.errors.suppliesFile }}</p> -->
                    </div>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Reproduction</div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">Reproduction Form</p>
                    <div class="flex justify-center">
                        <input type="file" @change="handleFileUpload($event, 'reproductionFile')" >
                        <!-- <p>{{ form.errors.reproductionFile }}</p> -->
                    </div>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-10 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Others, specify</div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">If applicable:</p>
                    <div class="flex justify-center">
                        <input type="file" @change="handleFileUpload($event, 'othersFile')" >
                        <!-- <p>{{ form.errors.othersFile }}</p> -->
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center gap-5 mb-10">
                <button @click="emit('previousStep')" class="border border-black rounded-xl text-ua-blue text-2xl px-12 py-4">Back</button>
                <button class="border border-ua-blue rounded-xl bg-ua-blue text-white text-2xl px-12 py-4">Submit</button>
            </div>

        </div>
</template>

<script setup>
    const props = defineProps({
        form: Object,
    })

    const emit = defineEmits(['previousStep', 'submitForm'])

    const handleFileUpload = (event, fieldName) => {
    const file = event.target.files[0];
    props.form[fieldName] = file;
}
</script>

<style scoped>

</style>