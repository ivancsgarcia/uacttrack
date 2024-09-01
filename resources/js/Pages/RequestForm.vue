<script setup>
import FormContainer from '../components/request-form/form-container.vue';

</script>

<template>
    <div class="wrapper">
        <UAHeader />
    </div>
    
    <div class="page">
        <SideMenu />

        <div class="content">
            <div class="one">
                <Account name="SSITE"></Account>
                
                <div class="right">
                    <SearchBar></SearchBar>
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
                </div>
            </div>

            <h2>University of the Assumption Forms</h2>

            <div class="flex-container">
                <div class="title">Form Titles</div>
                <div class="title dl">Download File</div>
            </div>

            <FormContainer title="Funding Request Form" link1="FRF.pdf" link2="FRF.docx" />
            <FormContainer title="~" link1=".pdf" link2=".docx" />
            <FormContainer title="~" link1=".pdf" link2=".docx" />
            <FormContainer title="~" link1=".pdf" link2=".docx" />
            <FormContainer title="~" link1=".pdf" link2=".docx" />
            <FormContainer title="~" link1=".pdf" link2=".docx" />
            
        </div>
  </div>
</template>

<style scoped>
    .wrapper {
      padding-bottom: 8vh;
    }

    .page {
        display: flex;
    }

    .content {
        margin-left: 15vw;
        width: 85vw;
    }

    .one {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 50px 50px;
    }

    .right {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    h2 {
        font-size: 3rem;
        text-align: center;
        color: #272F5C;
        margin-bottom: 40px;
    }

    .flex-container {
        display: flex;  
        gap: 15px;
        justify-content: center;
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