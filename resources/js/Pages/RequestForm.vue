<script setup>
import FormContainer from '../components/request-form/form-container.vue';

</script>

<template>
    <div class="wrapper">
        <UAHeader />
    </div>
    
    <div class="page flex">
        <SideMenu />

        <div class="content">
            <div class="one flex justify-between items-center">
                <Account name="SSITE"></Account>
                
                <div class="flex justify-center items-center gap-5">
                    <SearchBar></SearchBar>
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
                </div>
            </div>

            <!-- <div class="horizontal-line w-1/4 h-0.5 bg-black mb-5"></div> -->

            <h2>University of the Assumption Forms</h2>

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
            </div>

        </div>
  </div>
</template>

<style scoped>
    .wrapper {
      padding-bottom: 8vh;
    }

    .content {
        margin-left: 15vw;
        width: 85vw;
    }

    .one {
        margin: 20px 50px 50px;
    }

    h2 {
        font-size: 3rem;
        text-align: center;
        color: #272F5C;
        margin-bottom: 40px;
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