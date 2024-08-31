<script setup>
import Box from '../components/recommendation/Box.vue';
</script>

<template>
  <div class="wrapper">
    <UAHeader class="header"></UAHeader>
  </div>
    
  <div class="page">
      <SideBar></SideBar>

    <div class="content">
        <div class="one">
          <Account class="account" name="SSITE"></Account>
          <div class="right">
            <SearchBar></SearchBar>
            <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
            <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
          </div>
        </div>

        <div class="flex boxes">
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
          <Box></Box>
        </div>

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

  .flex {
    display: flex;
    justify-content: center;
    flex-wrap: wrap;
    gap: 20px;
  }

  .boxes {
    flex-wrap: wrap;
    flex: 1 1 calc(33.333% - 20px);
  }

</style>