<script setup>

</script>

<template>
    <UAHeader />
    <form action="" class="flex flex-col">
        <h1 class="pt-28 text-5xl text-ua-blue text-center mb-8">Activity Proposal Form</h1>
        <p class="m-auto text-ua-blue">(Approval Form for In-Campus Activities with corresponding Logistics and Funding Requirements)</p>
        <p class="m-auto text-ua-blue mb-4">Note: Deadline of Submission of activity form is three days before the activity. Please ensure that the date in the activity form that you will generate is correct because <span class="font-bold">it cannot be changed.</span></p>
        
        <div class="flex flex-col mx-auto mb-4 w-11/12">
            <label for="" class="text-ua-blue text-xl">Activity Title</label>
            <input type="text" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
        </div>

        <div class="flex flex-row mx-auto mb-4 w-11/12 gap-x-10">
            <div class="flex flex-col w-2/4">
                <label for="" class="text-ua-blue text-xl">Type of Event</label>
                <input type="text" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
            </div>
            <div class="flex flex-col w-3/5">
                <label for="" class="text-ua-blue text-xl">Activity Description</label>
                <textarea name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2"></textarea>
            </div>
        </div>

        <div class="flex mx-auto mb-4 w-11/12 gap-x-10">
            <div class="flex flex-col w-2/4">
                <label for="" class="text-ua-blue text-xl">Date</label>
                <input type="date" name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
            </div>
            <div class="flex flex-col w-1/4">
                <label for="" class="text-ua-blue text-xl">From Time</label>
                <input type="time" name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
            </div>
            <div class="flex flex-col w-1/4">
                <label for="" class="text-ua-blue text-xl">To Time</label>
                <input type="time" name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
            </div>
        </div>

        <div class="flex flex-col mx-auto mb-4 w-11/12">
            <label for="" class="text-ua-blue text-xl">Venue</label>
            <input type="text" name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
        </div>

        <div class="flex mx-auto mb-8 w-11/12 gap-x-10">
            <div class="flex flex-col w-2/4">
                <label for="" class="text-ua-blue text-xl">Requirements / Resources Needed</label>
                <textarea name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-full p-2"></textarea>
            </div>
            <div class="w-2/4">
                <div class="flex flex-col mb-4">
                    <label for="" class="text-ua-blue text-xl">Participants - Department / Program / Grade or Year Level</label>
                    <input type="text" name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
                </div>
                <div class="flex flex-col">
                    <label for="" class="text-ua-blue text-xl">Expected Number of Attendees</label>
                    <input type="number" name="" id="" class="border-2 rounded-md bg-ua-blue/30 h-16 p-2">
                </div>
            </div>
        </div>

        <div class="bg-black/20 text-ua-blue p-4 text-center text-2xl mb-4">
            Projected Funding Needs
        </div>

        <div class="flex mx-auto w-9/12 gap-8 mb-4">
            <div class="w-2/4 text-center p-2 text-ua-blue text-xl">Nature</div>
            <div class="w-2/4 text-center p-2 text-ua-blue text-xl">Forms to be Attached</div>
        </div>

        <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
            <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md">Check Payment / Cash</div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">Funding Request Form (FRF) for P1,000 and above or Petty Cash Form (PCF) for amount below P1,000.</p>
                <router-link><p class="text-center underline">Attach File Here</p></router-link>
            </div>
        </div>

        <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
            <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md">Food</div>
            <div class="bg-ua-blue/30 w-2/4 flex flex-col justify-center items-center p-2 rounded-md">
                <p class="text-center">Request for Meals (RFM)</p>
                <router-link><p class="text-center underline">Attach File Here</p></router-link>
            </div>
        </div>

        <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
            <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md">Supplies</div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">Requisition Form (RF) for supplies available at RMS or Purchase Requisition (PR) for supplies to be purchased</p>
                <router-link><p class="text-center underline">Attach File Here</p></router-link>
            </div>
        </div>

        <div class="flex mx-auto w-9/12 gap-8 mb-4 text-xl">
            <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md">Reproduction</div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">Reproduction Form</p>
                <router-link><p class="text-center underline">Attach File Here </p></router-link>
            </div>
        </div>

        <div class="flex mx-auto w-9/12 gap-8 mb-10 text-xl">
            <div class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md">Others, specify</div>
            <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                <p class="text-center">If applicable:</p>
                <router-link><p class="text-center underline ">Attach SRF Here</p></router-link>
            </div>
        </div>

        <div class="bg-ua-blue text-white w-1/5 text-center mx-auto mb-16 rounded-md py-4 text-xl">Submit</div>
    </form>
</template> 

<style scoped>

</style>