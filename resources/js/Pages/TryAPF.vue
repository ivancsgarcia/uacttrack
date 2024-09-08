<template>
    <div class="wrapper">
        <UAHeader />
    </div>

    <form class="w-4/5 flex flex-col justify-center items-center gap-5 mx-auto">
        <div class="part-one w-full space-y-4" v-if="partOne">
            <div class="flex justify-center items-center gap-5">
                <p class="text-ua-blue text-center font-bold text-3xl w-2/4">Identify the funding requirements for your activity.</p>
                <div class="bool flex justify-center items-center bg-ua-blue text-white text-3xl w-1/5 h-20 shadow-xl">Yes</div>
                <div class="bool flex justify-center items-center bg-ua-blue text-white text-3xl w-1/5 h-20 shadow-xl">No</div>
            </div>

            <div class="flex justify-center items-center gap-5">
                <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Check Payment / Cash</div>
                <div class="radio radio1 shadow-xl"><input type="radio" name="cash" value="yes" v-model="form.paymentOrCash"/></div>
                <div class="radio radio2 shadow-xl"><input type="radio" name="cash" value="no" v-model="form.paymentOrCash"/></div>
            </div>

            <div class="flex justify-center items-center gap-5">
                <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Food</div>
                <div class="radio radio1 shadow-xl"><input type="radio" name="food" value="yes" v-model="form.food"/></div>
                <div class="radio radio2 shadow-xl"><input type="radio" name="food" value="no" v-model="form.food"/></div>
            </div>

            <div class="flex justify-center items-center gap-5">
                <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Supplies</div>
                <div class="radio radio1 shadow-xl"><input type="radio" name="supplies" value="yes" v-model="form.supplies"/></div>
                <div class="radio radio2 shadow-xl"><input type="radio" name="supplies" value="no" v-model="form.supplies"/></div>
            </div>

            <div class="flex justify-center items-center gap-5">
                <div class="name flex justify-center items-center p-3 h-20 text-3xl w-2/4 shadow-xl">Reproduction</div>
                <div class="radio radio1 shadow-xl"><input type="radio" name="reproduction" value="yes" v-model="form.reproduction"/></div>
                <div class="radio radio2 shadow-xl"><input type="radio" name="reproduction" value="no" v-model="form.reproduction"/></div>
            </div>

            <div class="mx-14">
                <p class="text-lg">By clicking 'YES', you indicate that you need to download the following forms. To download these forms, please click the 'Forms' button.</p>
            </div>

            <div class="flex justify-center items-center gap-5">
                <div class="div-btn">Forms</div>
                <div as="button" @click="partOne = !partOne, partTwo = !partTwo" class="div-btn bg-ua-blue text-white">Next</div>
            </div>
        </div>

        <div class="part-two w-full" v-if="partTwo">
            <div class="flex justify-center gap-5">
                <div class="flex flex-col gap-10 w-2/4">
                    <div class="flex flex-col ">
                        <label for="date" class="text-ua-blue text-3xl">Date</label>
                        <input type="date" name="date" v-model="form.date" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                    <div class="flex flex-col">
                        <label for="from-time" class="text-ua-blue text-3xl">From Time</label>
                        <input type="time" name="from-time" v-model="form.fromTime" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                    <div class="flex flex-col">
                        <label for="to-time" class="text-ua-blue text-3xl">To Time</label>
                        <input type="time" name="to-time" v-model="form.toTime" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                </div>
                <div class="flex flex-col gap-10 w-2/4">
                    <div class="flex flex-col">
                        <label for="attendees" class="text-ua-blue text-3xl">Number of attendees</label>
                        <input type="number" name="attendees" v-model="form.numberOfAttendees" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                    <div class="flex flex-col">
                        <label for="event" class="text-ua-blue text-3xl">Type of Event</label>
                        <input type="text" name="event" v-model="form.typeOfEvent" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4" />
                    </div>
                </div>
            </div>

            <div class="h-0.5 bg-black my-10"></div>
            <div class="text-center bg-ua-blue text-white w-2/4 text-3xl p-4 mx-auto mb-5 rounded-md">Recommended Venue</div>

            <div class="flex justify-center gap-10 mb-10">
                <div class="flex flex-col w-2/4">
                    <label for="" class="text-ua-blue text-3xl">Available Venue (Recommended)</label>
                    <select name="vue" id="" v-model="form.availableVenue" class="border-2 rounded-md bg-ua-blue/30 h-20 text-2xl px-4">
                        <option value="">Pick a Venue</option>
                    </select>
                </div>
                <div class="flex flex-col w-2/4">
                    <label for="reqs" class="text-ua-blue text-3xl">Requirements / Resources Needed</label>
                    <textarea name="reqs" v-model="form.requirementsOrResourcesNeeded" class="border-2 rounded-md bg-ua-blue/30 h-40 text-2xl p-4"></textarea>
                </div>
            </div>

            <div class="flex justify-center items-center gap-5 mb-10">
                <div as="button" @click="partOne = !partOne, partTwo =!partTwo" class="div-btn">Back</div>
                <div as="button" @click="partTwo =!partTwo, partThree =!partThree" class="div-btn bg-ua-blue text-white">Next</div>
            </div>

        </div>

        <div class="part-three w-full" v-if="partThree">
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
                    <p class="text-center">Funding Request Form (FRF) for P1,000 and above or Petty Cash Form (PCF) for amount below P1,000.</p>
                    <p class="text-center underline">Attach File Here</p>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Food</div>
                <div class="bg-ua-blue/30 w-2/4 flex flex-col justify-center items-center p-2 rounded-md">
                    <p class="text-center">Request for Meals (RFM)</p>
                    <p class="text-center underline">Attach File Here</p>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Supplies</div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">Requisition Form (RF) for supplies available at RMS or Purchase Requisition (PR) for supplies to be purchased</p>
                    <p class="text-center underline">Attach File Here</p>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Reproduction</div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">Reproduction Form</p>
                    <p class="text-center underline">Attach File Here </p>
                </div>
            </div>

            <div class="flex mx-auto w-9/12 gap-8 mb-10 text-xl">
                <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md text-2xl">Others, specify</div>
                <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                    <p class="text-center">If applicable:</p>
                    <div class="file-upload">
                        <!-- Label acts as the custom file button -->
                        <label class="file-upload-label" for="fileInput">Attach File Here</label>
                        <!-- Actual hidden file input -->
                        <input type="file" id="fileInput" class="file-upload-input" onchange="updateFileName()">
                        <!-- Span to display the selected file name -->
                        <span class="file-name">No file selected</span>
                    </div>
                </div>
            </div>

            <div class="flex justify-center items-center gap-5 mb-10">
                <div as="button" @click="partTwo = !partTwo, partThree =!partThree" class="div-btn">Back</div>
                <div as="button" @click="" class="div-btn bg-ua-blue text-white">Submit</div>
            </div>

        </div>
    </form>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import { ref } from 'vue';

const partOne = ref(true);
const partTwo = ref(false);
const partThree = ref(false);

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
});
</script>

<style scoped>

    .wrapper {
        padding-bottom: 10vh;
      }

    form {
        min-height: 90vh;
    }

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

    .file-upload {
            /* display: inline-block;
            position: relative; */
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .file-upload-label {
            display: inline-block;
            padding: 10px 20px;
            /* background-color: #4CAF50; */
            /* color: white; */
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
            text-align: center;
            text-decoration: underline;
            font-weight: bold;
        }

        .file-upload-input {
            display: none; /* Hide the default file input */
        }

        .file-name {
            display: inline-block;
            margin-left: 10px;
            font-size: 14px;
            color: #333;
        }
</style>