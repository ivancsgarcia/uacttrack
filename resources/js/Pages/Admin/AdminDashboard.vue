<script setup>
import AdminLayout from "../../Layouts/AdminLayout.vue";
import { ref } from "vue";
import MyCalendar from "../../components/global/MyCalendar.vue";

defineOptions({ layout: AdminLayout });

const props = defineProps({
    activityForms: Object,
});

const showCollegeDean = ref(false);
const showOSA = ref(false);
const showVPAA = ref(false);
const showVPA = ref(false);
const copyReceive = ref(false);
</script>

<template>
    <h2>UA Academic Calendar and School Events</h2>
    <MyCalendar :activityForms="props.activityForms" />

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
        <div>Copy Receive</div>
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
