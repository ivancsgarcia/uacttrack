<script setup>
import Box from "../components/dashboard/Box.vue";
import Box2 from "../components/dashboard/Box2.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";

const props = defineProps({
    activityForms: Array,
});

const showCollegeDean = ref(false);
const showOSA = ref(false);
const showVPAA = ref(false);
const showFundings = ref(false);
const showCopyReceived = ref(false);
</script>

<template>
    <div class="app">
        <UAHeader />
        <SideMenu />

        <div class="main-content">
            <div class="account-section">
                <Account />

                <div class="icons-box">
                    <font-awesome-icon
                        :icon="['fas', 'envelope']"
                        size="2xl"
                        class="icon"
                    />
                    <font-awesome-icon
                        :icon="['fas', 'bell']"
                        size="2xl"
                        class="icon"
                    />
                </div>
            </div>

            <div class="vertical-line"></div>

            <div class="box-div">
                <Link :href="route('submitted-apf')">
                    <Box title="Submitted" />
                </Link>
                <Link :href="route('approved-apf')">
                    <Box title="Approved" />
                </Link>
                <Link :href="route('rejected-apf')">
                    <Box title="Rejected" />
                </Link>
            </div>

            <div class="vertical-line"></div>

            <h2>Approval</h2>
            <div class="box2-div">
                <Box2
                    title="College Dean"
                    @openModal="showCollegeDean = true"
                />
                <Box2
                    title="Office of Student Affairs"
                    @openModal="showOSA = true"
                />
                <Box2 title="VPAA Approval" @openModal="showVPAA = true" />
                <Box2
                    title="Funding Needs Reviewed"
                    @openModal="showFundings = true"
                />
                <Box2
                    title="Copy Received by:"
                    @openModal="showCopyReceived = true"
                />
            </div>

            <Modal
                v-model:modelValue="showCollegeDean"
                title="College Dean Approval"
            >
                <template> </template>
            </Modal>
            <Modal
                v-model:modelValue="showOSA"
                title="Office of Student Affairs Approval"
            >
                <p>Office of Student Affairs Approval</p>
            </Modal>
            <Modal v-model:modelValue="showVPAA" title="VPAA Approval">
                <p>VPAA Approval</p>
            </Modal>
            <Modal
                v-model:modelValue="showFundings"
                title="Funding Needs Reviewed"
            >
                <p>Funding Needs Reviewed</p>
            </Modal>
            <Modal v-model:modelValue="showCopyReceived" title="Copy Received">
                <p>Copy Received</p>
            </Modal>
        </div>
    </div>
</template>

<style scoped>
.app {
    display: flex;
    padding-top: 4rem;
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
</style>
