<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { ref } from "vue";
import FullCalendar from "../../components/global/FullCalendar.vue";
import CalendarListView from "../../components/global/CalendarListView.vue";

defineOptions({ layout: AdminLayout });

const props = defineProps({
    activityForms: Object,
    copyReceived: Object,
});

const showCollegeDean = ref(false);
const showOSA = ref(false);
const showVPAA = ref(false);
const showVPA = ref(false);
const copyReceive = ref(false);
</script>

<template>
    <h2>UA Academic Calendar and School Events</h2>
    <div class="flex gap-4 border">
        <div class="w-2/6">
            <CalendarListView />
        </div>
        <div class="w-4/6">
            <FullCalendar />
        </div>
    </div>

    <div class="vertical-line"></div>

    <h2>Approval</h2>
    <div class="box2-div">
        <Card @click="showCollegeDean = true">
            <template #content>
                <p>College Dean</p>
            </template>
        </Card>

        <Card @click="showOSA = true">
            <template #content>
                <p>Office of Student Affairs</p>
            </template>
        </Card>

        <Card @click="showVPAA = true">
            <template #content>
                <p>VPAA Approval</p>
            </template>
        </Card>

        <Card @click="showVPA = true">
            <template #content>
                <p>VPA Approval</p>
            </template>
        </Card>

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
                    <th>Activity Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="form in activityForms.data" :key="form.id">
                    <td>{{ form.id }}</td>
                    <td>{{ form.title }}</td>
                    <td
                        :class="{
                            'text-green-500':
                                form.college_dean_status === 'APPROVED',
                            'text-red-500':
                                form.college_dean_status === 'REJECTED',
                        }"
                    >
                        {{ form.college_dean_status }}
                    </td>
                </tr>
            </tbody>
        </table>
        <PaginationLinks :paginator="activityForms" />
    </Dialog>

    <Dialog v-model:visible="showOSA" header="OSA Approval Status" modal>
        <table>
            <thead>
                <tr>
                    <th>Transaction Number</th>
                    <th>Activity Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="form in activityForms.data" :key="form.id">
                    <td>{{ form.id }}</td>
                    <td>{{ form.title }}</td>
                    <td
                        :class="{
                            'text-green-500': form.osa_status === 'APPROVED',
                            'text-red-500': form.osa_status === 'REJECTED',
                        }"
                    >
                        {{ form.osa_status }}
                    </td>
                </tr>
            </tbody>
        </table>
        <PaginationLinks :paginator="activityForms" />
    </Dialog>

    <Dialog v-model:visible="showVPAA" header="VPAA Approval Status" modal>
        <table>
            <thead>
                <tr>
                    <th>Transaction Number</th>
                    <th>Activity Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="form in activityForms.data" :key="form.id">
                    <td>{{ form.id }}</td>
                    <td>{{ form.title }}</td>
                    <td
                        :class="{
                            'text-green-500': form.vpaa_status === 'APPROVED',
                            'text-red-500': form.vpaa_status === 'REJECTED',
                        }"
                    >
                        {{ form.vpaa_status }}
                    </td>
                </tr>
            </tbody>
        </table>
        <PaginationLinks :paginator="activityForms" />
    </Dialog>

    <Dialog v-model:visible="showVPA" header="VPA Approval Status" modal>
        <table>
            <thead>
                <tr>
                    <th>Transaction Number</th>
                    <th>Activity Title</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="form in activityForms.data" :key="form.id">
                    <td>{{ form.id }}</td>
                    <td>{{ form.title }}</td>
                    <td
                        :class="{
                            'text-green-500': form.vpa_status === 'APPROVED',
                            'text-red-500': form.vpa_status === 'REJECTED',
                        }"
                    >
                        {{ form.vpa_status }}
                    </td>
                </tr>
            </tbody>
        </table>
        <PaginationLinks :paginator="activityForms" />
    </Dialog>

    <Dialog v-model:visible="copyReceive" header="Copy Received By" modal>
        <table>
            <tr>
                <th colspan="2">Transaction Number</th>
                <th colspan="2">Activity Title</th>
            </tr>
            <tbody v-for="copyr in copyReceived.data" :key="copyr.id">
                <tr>
                    <td colspan="2">{{ copyr.id }}</td>
                    <td colspan="2">{{ copyr.title }}</td>
                </tr>
                <tr>
                    <th colspan="4">Send Copies To:</th>
                </tr>
                <tr>
                    <td>Proponent</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.proponent"
                            disabled
                        />
                    </td>
                    <td>Security</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.security"
                            disabled
                        />
                    </td>
                </tr>
                <tr>
                    <td>EAMO</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.eamo"
                            disabled
                        />
                    </td>
                    <td>Janitorial</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.janitorial"
                            disabled
                        />
                    </td>
                </tr>
                <tr>
                    <td>PhotoLab</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.photoLab"
                            disabled
                        />
                    </td>
                    <td>Sports</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.sports"
                            disabled
                        />
                    </td>
                </tr>
                <tr>
                    <td>PPGS</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.ppgs"
                            disabled
                        />
                    </td>
                    <td>Hotel</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.hotel"
                            disabled
                        />
                    </td>
                </tr>
                <tr>
                    <td>Sound System</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.soundSystem"
                            disabled
                        />
                    </td>
                    <td>Others</td>
                    <td>
                        <input
                            type="checkbox"
                            :checked="copyr.others_specify"
                            disabled
                        />
                    </td>
                </tr>
            </tbody>
        </table>
        <PaginationLinks :paginator="copyReceived" />
    </Dialog>
</template>

<style scoped>
.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin: 3rem;
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
</style>
