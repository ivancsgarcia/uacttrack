<script setup>
const props = defineProps({
    activityForms: Object,
    logoPath: String,
});

const downloadPDF = (activityId) => {
    const url = `/activity-form-pdf/${activityId}`;
    window.open(url, "_blank");
};
</script>

<template>
    <div class="app">
        <UAHeader />

        <div class="bg-img">
            <img :src="logoPath" alt="UA-logo" />
        </div>

        <div class="main-content p-4">
            <div class="">
                <h1 class="text-3xl text-center mb-8">
                    Activity Proposal Form
                </h1>
                <p class="m-auto text-md">
                    (Approval Form for In-Campus Activities with corresponding
                    Logistics and Funding Requirements)
                </p>
                <p class="m-auto text-md mb-4">
                    Note: Deadline of Submission of activity form is three days
                    before the activity. Please ensure that the date in the
                    activity form that you will generate is correct because it
                    cannot be changed.
                </p>

                <div class="flex flex-col mb-4">
                    <label class="text-2xl">Activity Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        v-model="activityForms.title"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    />
                </div>

                <div class="flex mb-4 gap-4">
                    <div class="flex flex-col w-2/4">
                        <label class="text-2xl">Type of Event</label>
                        <input
                            type="text"
                            name="event"
                            id="event"
                            v-model="activityForms.event_type"
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        />
                    </div>

                    <div class="flex flex-col w-2/4">
                        <label class="text-2xl">Activity Description</label>
                        <textarea
                            cols="30"
                            v-model="activityForms.title"
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        ></textarea>
                    </div>
                </div>

                <div class="flex mb-4 gap-4">
                    <div class="w-2/4 flex flex-col">
                        <label class="text-2xl">Date</label>
                        <input
                            type="date"
                            v-model="activityForms.date"
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        />
                    </div>

                    <div class="w-1/4 flex flex-col">
                        <label class="text-2xl">From Time</label>
                        <input
                            type="time"
                            v-model="activityForms.from_time"
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        />
                    </div>

                    <div class="w-1/4 flex flex-col">
                        <label class="text-2xl">To Time</label>
                        <input
                            type="time"
                            v-model="activityForms.to_time"
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        />
                    </div>
                </div>

                <div class="flex flex-col mb-4">
                    <label class="text-2xl">Venue</label>
                    <select
                        v-model="activityForms.venue"
                        disabled
                        class="rounded-xl shadow bg-ua-blue/30 p-2"
                    >
                        <option value=""></option>
                    </select>
                </div>

                <div class="flex gap-4">
                    <div class="flex flex-col w-2/4">
                        <label class="text-2xl"
                            >Requirements / Resources Needed</label
                        >
                        <textarea
                            cols="30"
                            rows="8"
                            v-model="
                                activityForms.requirements_or_resources_needed
                            "
                            disabled
                            class="rounded-xl shadow bg-ua-blue/30 p-2"
                        ></textarea>
                    </div>

                    <div class="flex flex-col w-2/4">
                        <div class="flex flex-col mb-4">
                            <label class="text-2xl"
                                >Participants - Department / Program / Grade or
                                Year Level</label
                            >
                            <textarea
                                cols="30"
                                rows="4"
                                v-model="activityForms.participant"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            ></textarea>
                        </div>

                        <div class="flex flex-col">
                            <label class="text-2xl"
                                >Expected Number of Attendees</label
                            >
                            <input
                                type="number"
                                v-model="activityForms.attendance_count"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="">
                <div class="p-2 bg-black/20 text-center text-2xl my-8">
                    <h2>Projected Funding Needs</h2>
                </div>

                <!-- <div class="flex mb-4">
                    <div class="w-2/4 text-center text-ua-blue text-2xl">
                        Nature
                    </div>
                    <div class="w-2/4 text-center text-ua-blue text-2xl">
                        Forms to be Attached
                    </div>
                </div> -->

                <!-- <div class="flex gap-4 mb-4 text-xl">
                    <div
                        class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                    >
                        Check Payment / Cash
                    </div>
                    <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                        <p class="text-center">
                            Funding Request Form (FRF) for P1,000 and above or
                            Petty Cash Form (PCF ) for amount below P1,000.
                        </p>
                        <div class="flex justify-center">
                            <input
                                type="file"
                                @change="
                                    handleFileUpload(
                                        $event,
                                        'payment_or_cash_file'
                                    )
                                "
                            />
                        </div>
                    </div>
                </div> -->

                <!-- <div class="flex mx-auto gap-4 mb-4 text-xl">
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
                                type="file"
                                @change="handleFileUpload($event, 'food_file')"
                            />
                        </div>
                    </div>
                </div> -->

                <!-- <div class="flex mx-auto gap-4 mb-4 text-xl">
                    <div
                        class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                    >
                        Supplies
                    </div>
                    <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                        <p class="text-center">
                            Requisition Form (RF) for supplies available at RMS
                            or Purchase Requisition (PR) for supplies to be
                            purchased
                        </p>
                        <div class="flex justify-center">
                            <input
                                type="file"
                                @change="
                                    handleFileUpload($event, 'supplies_file')
                                "
                            />
                        </div>
                    </div>
                </div> -->

                <!-- <div class="flex mx-auto gap-4 mb-4 text-xl">
                    <div
                        class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                    >
                        Reproduction
                    </div>
                    <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                        <p class="text-center">Reproduction Form</p>
                        <div class="flex justify-center">
                            <input
                                type="file"
                                @change="
                                    handleFileUpload(
                                        $event,
                                        'reproduction_file'
                                    )
                                "
                            />
                        </div>
                    </div>
                </div> -->

                <!-- <div class="flex gap-4 text-xl">
                    <div
                        class="bg-ua-blue/30 w-2/4 flex justify-center items-center p-2 rounded-md"
                    >
                        Others, specify
                    </div>
                    <div class="bg-ua-blue/30 w-2/4 p-2 rounded-md">
                        <p class="text-center">If applicable:</p>
                        <div class="flex justify-center">
                            <input
                                type="file"
                                @change="
                                    handleFileUpload($event, 'others_file')
                                "
                            />
                        </div>
                    </div>
                </div> -->
            </div>

            <!-- <div class="">
                <div class="p-2 bg-black/20 text-center text-2xl my-8">
                    <h2>Approvals</h2>
                </div>

                <div class="flex justify-center gap-4">
                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label>Prepared By</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Activity Endorsed By</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Activity Endorsed By</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Activity Endorsed By</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label>Role</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Role</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Role</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Role</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label>Status</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Status</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Status</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Status</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                    </div>
                </div>

                <div class="vertical-line"></div>

                <div class="mx-auto flex justify-center gap-4">
                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label>Funding Needs Reviewed By</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Funding Needs Aprroved By</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Funding Needs Aprroved By</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                    </div>
                    <div class="space-y-4">
                        <div class="flex flex-col">
                            <label>Signature</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Signature</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                        <div class="flex flex-col">
                            <label>Signature</label>
                            <input
                                type="text"
                                disabled
                                class="rounded-xl shadow bg-ua-blue/30 p-2"
                            />
                        </div>
                    </div>
                </div>

                <div class="vertical-line"></div>

                <div class="">
                    <p class="text-center text-2xl mb-4">Copy Received By:</p>

                    <div class="flex justify-center gap-4">
                        <div class="space-y-4">
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">Proponent</p>
                            </div>
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">PPGS</p>
                            </div>
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">Sports</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">EAMO</p>
                            </div>
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">Security</p>
                            </div>
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">Hotel</p>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">PhotoLab</p>
                            </div>
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p class="text-xl">Janitorial</p>
                            </div>
                            <div class="text-center">
                                <input
                                    type="checkbox"
                                    disabled
                                    class="scale-150"
                                />
                                <p>Sound System</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="flex justify-center gap-8">
                <div class="bg-red-300 rounded-md px-8 py-2">
                    <button>Cancel</button>
                </div>
                <div class="bg-yellow-300 rounded-md px-8 py-2">
                    <button
                        :href="route('activity-form.edit', activityForms.id)"
                    >
                        Edit
                    </button>
                </div>
                <div v-if="activityForms.status === 'APPROVED'">
                    <button @click="downloadPDF(activityForms.id)">
                        Download PDF
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.app {
    padding-top: 4rem;
    width: 100%;
}

.bg-img {
    position: fixed;
    right: 0;
    bottom: 0;
    z-index: -1;
    margin-bottom: -3rem;
    margin-right: -3rem;
}

.bg-img img {
    transform: rotate(15deg);
    width: 40rem;
    filter: grayscale(100%);
    opacity: 0.1;
}

.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin: 2rem 0;
}
</style>
