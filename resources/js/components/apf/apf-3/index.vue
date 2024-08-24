<script setup>
import APFHeader from '../APFHeader.vue';

</script>

<template>
    <APFHeader title="University of the Assumption"/>
    <form action="" class="flex flex-col justify-center">
        <h1 class="pt-32 text-4xl text-ua-blue">Activity Proposal Form</h1>
        <p>(Approval Form for In-Campus Activities with corresponding Logistics and Funding Requirements)</p>
        <p>Note: Deadline of Submission of activity form is three days before the activity. Please ensure that the date in the activity form that you will generate is correct because <span class="font-bold">it cannot be changed.</span></p>
        
        <div class="flex flex-col">
            <label for="">Activity Title</label>
            <input type="text">
        </div>

        <div>
            <div class="flex flex-col">
                <label for="">Type of Event</label>
                <input type="text">
            </div>
            <div class="flex flex-col">
                <label for="">Activity Description</label>
                <textarea name="" id=""></textarea>
            </div>
        </div>

        <div>
            <div class="flex flex-col">
                <label for="">Date</label>
                <input type="date" name="" id="">
            </div>
            <div class="flex flex-col">
                <label for="">From Time</label>
                <input type="time" name="" id="">
            </div>
            <div class="flex flex-col">
                <label for="">To Time</label>
                <input type="time" name="" id="">
            </div>
        </div>

        <div class="flex flex-col">
            <label for="">Venue</label>
            <input type="text" name="" id="">
        </div>

        <div>
            <div class="flex flex-col">
                <label for="">Requirements / Resources Needed</label>
                <textarea name="" id=""></textarea>
            </div>
            <div>
                <div class="flex flex-col">
                    <label for="">Participants - Department / Program / Grade or Year Level</label>
                    <input type="text" name="" id="">
                </div>
                <div class="flex flex-col">
                    <label for="">Expected Number of Attendees</label>
                    <input type="number" name="" id="">
                </div>
            </div>
        </div>

        <div class="bg-black/20">
            Projected Funding Needs
        </div>

        <div class="flex gap-2">
            <div>Nature</div>
            <div>Forms to be Attached</div>
        </div>

        <div class="flex gap-2">
            <div class="bg-ua-blue/30">Check Payment / Cash</div>
            <div class="bg-ua-blue/30">
                <p>Funding Request Form (FRF) for P1,000 and above or Petty Cash Form (PCF) for amount below P1,000.</p>
                <p>Attach File Here</p>
            </div>
        </div>

        <div class="flex gap-2">
            <div class="bg-ua-blue/30">Food</div>
            <div class="bg-ua-blue/30">
                <p>Request for Meals (RFM)</p>
                <p>Attach File Here</p>
            </div>
        </div>

        <div class="flex gap-2">
            <div class="bg-ua-blue/30">Supplies</div>
            <div class="bg-ua-blue/30">
                <p>Requisition Form (RF) for supplies available at RMS or Purchase Requisition (PR) for supplies to be purchased</p>
                <p>Attach File Here</p>
            </div>
        </div>

        <div class="flex gap-2">
            <div class="bg-ua-blue/30">Reproduction</div>
            <div class="bg-ua-blue/30">
                <p>Reproduction Form</p>
                <p>Attach File Here </p>
            </div>
        </div>

        <div class="flex gap-2">
            <div class="bg-ua-blue/30">Others, specify</div>
            <div class="bg-ua-blue/30">
                <p>If applicable:</p>
                <p>Attach SRF Here</p>
            </div>
        </div>

        <div class="bg-ua-blue text-white w-32 text-center m-auto rounded-md py-4">Submit</div>
    </form>
</template>

<style scoped>

</style>