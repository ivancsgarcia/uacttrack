<script setup>
const props = defineProps({
    activityForms: Object,
});
</script>

<template>
    <div class="app pt-16">
        <UAHeader />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>
        
        <div class="content">
            <div class="part-1">
                <h1>Activity Proposal Form</h1>
                <p>
                    (Approval Form for In-Campus Activities with corresponding
                    Logistics and Funding Requirements)
                </p>
                <p>
                    Note: Deadline of Submission of activity form is three days
                    before the activity. Please ensure that the date in the
                    activity form that you will generate is correct because it
                    cannot be changed.
                </p>

                <div class="input-box">
                    <label for="title">Activity Title</label>
                    <input
                        type="text"
                        name="title"
                        id="title"
                        v-model="activityForms.title"
                        disabled
                    />
                </div>

                <div class="horizontal">
                    <div class="input-box">
                        <label for="">Type Of Event</label>
                        <input
                            type="text"
                            name="event"
                            id="event"
                            v-model="activityForms.event_type"
                            disabled
                        />
                    </div>

                    <div class="input-box">
                        <label for="desc">Activity Description</label>
                        <textarea
                            name="desc"
                            id="desc"
                            cols="30"
                            v-model="activityForms.title"
                            disabled
                        ></textarea>
                    </div>
                </div>

                <div class="horizontal">
                    <div class="input-box">
                        <label for="date">Date</label>
                        <input
                            type="date"
                            name="date"
                            id="date"
                            v-model="activityForms.date"
                            disabled
                        />
                    </div>

                    <div class="input-box">
                        <label for="from-time">From Time</label>
                        <input
                            type="time"
                            name="from-time"
                            id="from-time"
                            v-model="activityForms.from_time"
                            disabled
                        />
                    </div>

                    <div class="input-box">
                        <label for="">To Time</label>
                        <input
                            type="time"
                            name=""
                            id=""
                            v-model="activityForms.to_time"
                            disabled
                        />
                    </div>
                </div>

                <div class="input-box">
                    <label for="">Venue</label>
                    <select
                        name=""
                        id=""
                        v-model="activityForms.venue"
                        disabled
                    >
                        <option value=""></option>
                    </select>
                </div>

                <div class="horizontal">
                    <div class="input-box">
                        <label for="">Requirements / Resources Needed</label>
                        <textarea
                            name=""
                            id=""
                            cols="30"
                            rows="8"
                            v-model="
                                activityForms.requirements_or_resources_needed
                            "
                            disabled
                        ></textarea>
                    </div>

                    <div class="vertical">
                        <div class="input-box">
                            <label for=""
                                >Participants - Department / Program / Grade or
                                Year Level</label
                            >
                            <textarea
                                name=""
                                id=""
                                cols="30"
                                rows="4"
                                v-model="activityForms.participant"
                                disabled
                            ></textarea>
                        </div>

                        <div class="input-box">
                            <label for="">Expected Number of Attendees</label>
                            <input
                                type="number"
                                name=""
                                id=""
                                v-model="activityForms.attendance_count"
                                disabled
                            />
                        </div>
                    </div>
                </div>
            </div>

            <div class="part-2">
                <div class="title-box">
                    <h2>Projected Funding Needs</h2>
                </div>

                <div class="horizontal">
                    <p class="pfn-title">Nature</p>
                    <p class="pfn-title">Forms To Be Attached</p>
                </div>

                <div class="horizontal">
                    <div class="pfn-name">Check Payment / Cash</div>
                    <div class="pfn-box">
                        <p>
                            Funding Request Form(FRF) for P 1,000 and above or
                            Petty Cash Form(PCF) for amount below P 1,000.
                        </p>
                        <input type="file" name="" id="" />
                    </div>
                </div>

                <div class="horizontal">
                    <div class="pfn-name">Food</div>
                    <div class="pfn-box">
                        <p>Request for Meals (RFM)</p>
                        <input type="file" name="" id="" />
                    </div>
                </div>

                <div class="horizontal">
                    <div class="pfn-name">Supplies</div>
                    <div class="pfn-box">
                        <p>
                            Requisition Form (RF) for supplies available at RMS
                            or Purchase Requisition (PR) for supplies to be
                            purchased
                        </p>
                        <input type="file" name="" id="" />
                    </div>
                </div>

                <div class="horizontal">
                    <div class="pfn-name">Reproduction</div>
                    <div class="pfn-box">
                        <p>Reproduction Form</p>
                        <input type="file" name="" id="" />
                    </div>
                </div>

                <div class="horizontal">
                    <div class="pfn-name">Others</div>
                    <div class="pfn-box">
                        <p>If applicable:</p>
                        <input type="file" name="" id="" />
                    </div>
                </div>
            </div>

            <div class="part-3">
                <div class="title-box">
                    <h2>Approvals</h2>
                </div>

                <div class="horizontal">
                    <div>
                        <div class="input-box">
                            <label for="">Prepared By</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Activity Endorsed By</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Activity Endorsed By</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Activity Endorsed By</label>
                            <input type="text" name="" id="" />
                        </div>
                    </div>
                    <div>
                        <div class="input-box">
                            <label for="">Role</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Role</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Role</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Role</label>
                            <input type="text" name="" id="" />
                        </div>
                    </div>
                    <div>
                        <div class="input-box">
                            <label for="">Status</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Status</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Status</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Status</label>
                            <input type="text" name="" id="" />
                        </div>
                    </div>
                </div>

                <div class="vertical-line"></div>

                <div class="horizontal">
                    <div>
                        <div class="input-box">
                            <label for="">Funding Needs Reviewed By</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Funding Needs Aprroved By</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">Funding Needs Aprroved By</label>
                            <input type="text" name="" id="" />
                        </div>
                    </div>
                    <div>
                        <div class="input-box">
                            <label for="">E-Sginature</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">E-Sginature</label>
                            <input type="text" name="" id="" />
                        </div>
                        <div class="input-box">
                            <label for="">E-Sginature</label>
                            <input type="text" name="" id="" />
                        </div>
                    </div>
                </div>

                <div class="vertical-line"></div>

                <div class="copy-receive-section">
                    <p class="name">Copy Received By:</p>

                    <div class="idk">
                        <div>
                            <div class="copy-receive-box">
                                <p>Proponent</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                            <div class="copy-receive-box">
                                <p>PPGS</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                            <div class="copy-receive-box">
                                <p>Sports</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                        </div>
                        <div>
                            <div class="copy-receive-box">
                                <p>EAMO</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                            <div class="copy-receive-box">
                                <p>Security</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                            <div class="copy-receive-box">
                                <p>Hotel</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                        </div>
                        <div>
                            <div class="copy-receive-box">
                                <p>PhotoLab</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                            <div class="copy-receive-box">
                                <p>Janitorial</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                            <div class="copy-receive-box">
                                <p>Sound System</p>
                                <input type="checkbox" name="" id="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.content {
    /* background-color: #d2d2d2; */
    /* display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center; */
    padding: 2rem 0;
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
    width: 60rem;
    filter: grayscale(100%);
    opacity: 0.1;
}

.part-1,
.part-2,
.part-3 {
    width: 90%;
    margin: 0 auto;
}

.part-1 h1 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.part-1 h1,
.part-1 p {
    text-align: center;
}

.input-box {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    margin-top: 1rem;
}

.input-box label {
    font-size: 1.5rem;
}

.part-1 .horizontal {
    display: flex;
    justify-content: center;
    gap: 1rem;
    flex-wrap: wrap;
}

.part-1 .vertical {
    display: flex;
    flex-direction: column;
    flex-wrap: wrap;
}

.part-1 input,
.part-1 select,
.part-1 textarea {
    background-color: lightsteelblue;
    padding: 1rem;
    border-radius: 0.5rem;
    font-size: 1.2rem;
}

input:focus,
select:focus,
textarea:focus {
    outline: none;
    border: none;
}

.part-2 {
    margin: 2rem auto;
}

.title-box {
    text-align: center;
    padding: 0.5rem;
    background-color: lightgray;
    margin-bottom: 1rem;
    font-size: 1.5rem;
}

.part-2 .horizontal {
    display: flex;
    justify-content: center;
    gap: 1rem;
    margin-bottom: 1rem;
}

.pfn-name,
.pfn-box {
    background-color: lightsteelblue;
    padding: 1rem;
    border-radius: 0.5rem;
    font-size: 1.2rem;
}

.pfn-name {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 35%;
}

.pfn-box {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 65%;
}

.part-3 .horizontal {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1rem;
}

.part-3 .horizontal > div {
    flex-grow: 1;
}

.part-3 input {
    background-color: lightsteelblue;
    padding: 1rem;
    border-radius: 0.5rem;
    font-size: 1.2rem;
}

.vertical-line {
    height: 0.1rem;
    background-color: black;
    margin: 2rem 0;
}

.copy-receive-section .name {
    font-size: 1.5rem;
    text-align: center;
}

.idk {
    display: flex;
    justify-content: center;
    align-items: center;
}

.copy-receive-box {
    display: flex;
    justify-content: start;
    align-items: center;
}
</style>
