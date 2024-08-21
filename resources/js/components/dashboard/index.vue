<script setup>
import UAheader from './UAheader.vue';
import Account from './Account.vue';
import Box from './Box.vue';
import Box2 from './Box2.vue';
import SearchBar from './SearchBar.vue';
import SideBar from './SideBar.vue'
</script>

<template>
  <UAheader></UAheader>
  <div class="page">
      <SideBar></SideBar>
    
    <div>
        <div class="one">
          <Account name="SSITE"></Account>
          <SearchBar></SearchBar>
          <p>Icon</p>
          <p>Icon</p>
        </div>
        <br>
        <div class="flex">
          <Box title="Submitted"></Box>
          <Box title="Approved"></Box>
          <Box title="Rejected"></Box>
        </div>
        <br>
        <div class="horizontal-line"></div>
        <br>
        <h2>Approval</h2>
        <br>
        <div class="flex">
          <Box2 title="College Dean (For RSO)"></Box2>
          <Box2 title="OFFICE OF STUDENT AFFAIRS (For RSO)"></Box2>
          <Box2 title="VPAA Approval"></Box2>
          <Box2 title="Funding Needs Reviewed "></Box2>
          <Box2 title="Copy Received by:"></Box2>
      </div>
    </div>
  </div>
</template>

<style scoped>
  .page {
    display: flex;
  }

  .one {
    display: flex;
    justify-content: space-between;
  }

  .flex {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 10px;
  }

  .horizontal-line {
    height: 2px;
    background-color: #000;
  }

  h2 {
    font-size: 2rem;
  }
</style>
