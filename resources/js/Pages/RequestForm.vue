<template>
    <div class="app flex pt-16">
    <UAHeader />
    <SideMenu/>

        <div class="main-content w-screen ml-64 p-5">
            <div class="flex justify-between items-center mt-5 mx-12 mb-8">
                <Account class="account" /> 
                
                <div class="flex justify-center items-center gap-5">
                    <SearchBar></SearchBar>
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
                </div>
            </div>

            <!-- <div class="horizontal-line w-1/4 h-0.5 bg-black mb-5"></div> -->

            <h2 class="text-center text-5xl mb-8">University of the Assumption Forms</h2>
<!-- 
            <div class="flex-container flex justify-center gap-4">
                <div class="title">Form Titles</div>
                <div class="title dl">Download File</div>
            </div>

            <div class="mb-14">
                <FormContainer title="Funding Request Form" link1="FRF.pdf" link2="FRF.docx" />
                <FormContainer title="Petty Cash Form" link1="PCF.pdf" link2="PCF.docx" />
                <FormContainer title="Request For Meals Form" link1="RFM.pdf" link2="RFM.docx" />
                <FormContainer title="Requisition Form" link1="RF.pdf" link2="RF.docx" />
                <FormContainer title="Purchase Requisition" link1="PR.pdf" link2="PR.docx" />
                <FormContainer title="Reproduction Form" link1="Reproduction.pdf" link2="Reproduction.docx" />
            </div> -->

            <table class="w-4/5 mx-auto text-center text-3xl border-separate border-spacing-4">
                <thead class="bg-ua-blue text-white">
                    <tr class="h-20">
                        <th class="border w-9/12" >Form Titles</th>
                        <th colspan="2" class="border">Download File</th>
                    </tr>
                </thead>
                <tbody class="bg-ua-gray">
                    <tr class="h-16">
                        <td class="border">Funding Request Form</td>
                        <td class="border">pdf</td>
                        <td class="border">docx</td>
                    </tr>
                    <tr class="h-16">
                        <td class="border">Petty Cash Form</td>
                        <td class="border">pdf</td>
                        <td class="border">docx</td>
                    </tr>
                    <tr class="h-16">
                        <td class="border">Request For Meals Form</td>
                        <td class="border">pdf</td>
                        <td class="border">docx</td>
                    </tr>
                    <tr class="h-16">
                        <td class="border">Requisition Form</td>
                        <td class="border">pdf</td>
                        <td class="border">docx</td>
                    </tr>
                    <tr class="h-16">
                        <td class="border">Purchase Requisition</td>
                        <td class="border">pdf</td>
                        <td class="border">docx</td>
                    </tr>
                    <tr class="h-16">
                        <td class="border">Reproduction Form</td>
                        <td class="border">pdf</td>
                        <td class="border">docx</td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>
</template>

<script setup>
import FormContainer from '../components/request-form/form-container.vue';
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';

const page = usePage();
const user = computed(() => page.props.auth.user);
const fullName = `${user.value.firstName} ${user.value.lastName}`;

</script>

<style scoped>

    .main-content {
        min-height: calc(100vh - 64px);
    }

    h2 {
        color: #272F5C;
    }

    .title {
        width: 50%;
        background-color: rgba(39, 47, 92, 0.8);
        font-size: 2rem;
        padding: 10px;
        text-align: center;
        color: #fff;
    }

    .dl {
        width: 20%;
    }


</style>