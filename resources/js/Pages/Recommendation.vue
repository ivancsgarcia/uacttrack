<script setup>
import Box from '../components/recommendation/Box.vue';
</script>

<template>
  <div class="wrapper">
    <UAHeader />
  </div>
    
  <div class="page flex">
      <SideMenu />

    <div class="content">
        <div class="one flex justify-between items-center">
          <Account class="account" name="SSITE"></Account>
          <div class="flex justify-center items-center gap-5">
            <SearchBar></SearchBar>
            <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
            <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
          </div>
        </div>

        <div class="flex justify-center flex-wrap gap-5 boxes">
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

  .content {
    margin-left: 15vw;
  }

  .one {
    margin: 20px 50px 50px;
  }

  .boxes {
    flex: 1 1 calc(33.333% - 20px);
  }

</style>