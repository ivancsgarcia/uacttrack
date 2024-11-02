<script setup>
import PaginationLinks from '../../components/global/PaginationLinks.vue';

const props = defineProps({
    activityForms: Object,
});
</script>

<template>
    <div class="app flex pt-16">
        <UAHeader />
        <AdminSideMenu />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="main-content w-screen ml-64 p-5">
            <div class="flex justify-between items-center mt-5 mx-12 mb-4">
                <Account class="account" />

                <div class="flex justify-center items-center gap-5">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl" />
                </div>
            </div>

            <div class="h-0.5 bg-ua-blue mb-12"></div>

            <table v-for="form in activityForms.data" :key="form.id">
                <tr>
                    <th colspan="2">Transaction Number</th>
                    <th colspan="2">Activity Title</th>
                </tr>
                <tr>
                    <td colspan="2">{{ form.id }}</td>
                    <td colspan="2">{{ form.title }}</td>
                </tr>
                <tr>
                    <th colspan="4">Send Copies To:</th>
                </tr>
                <tr>
                    <td>Proponent</td>
                    <td>
                        <input
                            type="checkbox"
                            value="proponent"
                            class="checkbox"
                        />
                    </td>
                    <td>Security</td>
                    <td>
                        <input
                            type="checkbox"
                            value="security"
                            class="checkbox"
                        />
                    </td>
                </tr>
                <tr>
                    <td>EAMO</td>
                    <td>
                        <input type="checkbox" value="eamo" class="checkbox" />
                    </td>
                    <td>Janitorial</td>
                    <td>
                        <input
                            type="checkbox"
                            value="janitorial"
                            class="checkbox"
                        />
                    </td>
                </tr>
                <tr>
                    <td>PhotoLab</td>
                    <td>
                        <input
                            type="checkbox"
                            value="photolab"
                            class="checkbox"
                        />
                    </td>
                    <td>Sports</td>
                    <td>
                        <input
                            type="checkbox"
                            value="sports"
                            class="checkbox"
                        />
                    </td>
                </tr>
                <tr>
                    <td>PPGS</td>
                    <td>
                        <input type="checkbox" value="ppgs" class="checkbox" />
                    </td>
                    <td>Hotel</td>
                    <td>
                        <input type="checkbox" value="hotel" class="checkbox" />
                    </td>
                </tr>
                <tr>
                    <td>Sound System</td>
                    <td>
                        <input
                            type="checkbox"
                            value="sound system"
                            class="checkbox"
                        />
                    </td>
                    <td>Others</td>
                    <td>
                        <input
                            type="checkbox"
                            value="others"
                            class="checkbox"
                        />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">Edit</td>
                    <td colspan="2">Confirm</td>
                </tr>
                <tr>
                    <td colspan="4" class="!border-transparent">
                        <PaginationLinks :paginator="activityForms" />
                    </td>
                </tr>
            </table>
            <!-- <div class="mt-8">
                
            </div> -->
        </div>
    </div>
</template>

<style scoped>
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

table {
    margin: auto;
    border-collapse: collapse;
}
th,
td {
    padding: 1rem;
    text-align: center;
}

table,
th,
td {
    border: 4px solid #272f5c;
}

th {
    font-weight: bold;
    font-size: 1.5rem;
}

td {
    font-size: 1.2rem;
}

input {
    transform: scale(2);
}
</style>
