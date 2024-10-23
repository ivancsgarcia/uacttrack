<script setup>
import Box from "../components/dashboard/Box.vue";
import Box2 from "../components/dashboard/Box2.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import MyDialog from "../components/global/MyDialog.vue";

const props = defineProps({
    activityForms: Array,
});

const showCollegeDean = ref(false);
const showOSA = ref(false);
const showVPAA = ref(false);
const showFundings = ref(false);
const copyReceive = ref(false);
const op = ref();

const toggle = (event) => {
    op.value.toggle(event);
};
</script>

<template>
    <div class="app">
        <UAHeader />
        <SideMenu />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="main-content">
            <div class="account-section">
                <Account />

                <div class="icons-box">
                    <div>
                        <font-awesome-icon
                            :icon="['fas', 'envelope']"
                            size="2xl"
                            class="icon"
                        />
                    </div>
                    <div>
                        <font-awesome-icon
                            @click="toggle"
                            :icon="['fas', 'bell']"
                            size="2xl"
                            class="icon"
                        />
                        <Popover ref="op">
                            <div>hi</div>
                        </Popover>
                    </div>
                </div>
            </div>

            <div class="vertical-line"></div>

            <div class="box-div">
                <Link :href="route('submitted-apf')">
                    <!-- <Box title="Submitted" /> -->
                    <Card>
                        <template #content>
                            <p>Submitted</p>
                            <p>Activity Proposal Form</p>
                        </template>
                    </Card>
                </Link>
                <Link :href="route('approved-apf')">
                    <!-- <Box title="Approved" /> -->
                    <Card>
                        <template #content>
                            <p>Approved</p>
                            <p>Activity Proposal Form</p>
                        </template>
                    </Card>
                </Link>
                <Link :href="route('rejected-apf')">
                    <!-- <Box title="Rejected" /> -->
                    <Card>
                        <template #content>
                            <p>Rejected</p>
                            <p>Activity Proposal Form</p>
                        </template>
                    </Card>
                </Link>
            </div>

            <div class="vertical-line"></div>

            <h2>Approval</h2>
            <div class="box2-div">
                <!-- <Box2
                    title="College Dean"
                    @openModal="showCollegeDean = true"
                /> -->
                <Card @click="showCollegeDean = true">
                    <template #content>
                        <p>College Dean</p>
                    </template>
                </Card>

                <!-- <Box2
                    title="Office of Student Affairs"
                    @openModal="showOSA = true"
                /> -->
                <Card @click="showOSA = true">
                    <template #content>
                        <p>Office of Student Affairs</p>
                    </template>
                </Card>

                <!-- <Box2 title="VPAA Approval" @openModal="showVPAA = true" /> -->
                <Card @click="showVPAA = true">
                    <template #content>
                        <p>VPAA Approval</p>
                    </template>
                </Card>

                <!-- <Box2
                    title="Funding Needs Reviewed"
                    @openModal="showFundings = true"
                /> -->
                <Card @click="showFundings = true">
                    <template #content>
                        <p>Funding Needs Reviewed</p>
                    </template>
                </Card>

                <!-- <Box2
                    title="Copy Received by:"
                    @openModal="copyReceive = true"
                /> -->
                <Card @click="copyReceive = true">
                    <template #content>
                        <p>Copy Received by</p>
                    </template>
                </Card>
            </div>

            <Dialog
                v-model:visible="showCollegeDean"
                header="College Dean Approval Status"
                modal
            >
                <table>
                    <thead>
                        <tr>
                            <th>Transaction Number</th>
                            <th>College Dean</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="form in activityForms" :key="form.id">
                            <td>{{ form.id }}</td>
                            <td></td>
                            <td>{{ form.college_dean_status }}</td>
                        </tr>
                    </tbody>
                </table>
            </Dialog>

            <Dialog
                v-model:visible="showOSA"
                header="OSA Approval Status"
                modal
            >
                <table>
                    <thead>
                        <tr>
                            <th>Transaction Number</th>
                            <th>OSA</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Joey Suba</td>
                            <td>Pending</td>
                        </tr>
                    </tbody>
                </table>
            </Dialog>

            <Dialog
                v-model:visible="showVPAA"
                header="VPAA Approval Status"
                modal
            >
                <table>
                    <thead>
                        <tr>
                            <th>Transaction Number</th>
                            <th>VPAA</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>01</td>
                            <td>Joey Suba</td>
                            <td>Pending</td>
                        </tr>
                    </tbody>
                </table>
            </Dialog>

            <Dialog
                v-model:visible="showFundings"
                header="Fundings Approval Status"
                modal
            >
                <div>Fundings</div>
            </Dialog>

            <Dialog
                v-model:visible="copyReceive"
                header="Copy Received By"
                modal
            >
                <div>Copy Receive</div>
            </Dialog>
        </div>
    </div>
</template>

<style scoped>
.app {
    display: flex;
    padding-top: 4rem;
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

.main-content {
    /* width: 100vw; */
    margin-left: 16rem;
    padding: 1rem;
}

.account-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem;
}

.icons-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
}

.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
}

.box-div {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin: 1rem 0 3rem;
}

h2 {
    text-align: center;
    color: #272f5c;
    font-size: 2.2rem;
    margin: -1rem 0 1rem;
}

.box2-div {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem;
}

table {
    border-collapse: separate;
    background-color: #272f5c;
}

table,
th,
td {
    border: 2px solid #272f5c;
    border-radius: 0.2rem;
}

th,
td {
    padding: 1rem;
    text-align: center;
    background-color: #fff;
}

.p-card {
    width: 20rem;
    background-color: #272f5c;
    color: white;
}
</style>
