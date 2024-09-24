<script setup>

</script>

<template>
    <div class="app flex pt-16">
      <UAHeader />
      <AdminSideMenu/>
  
      <div class="main-content w-screen ml-64 p-5">
        <div class="flex justify-between items-center mt-5 mx-12 mb-4">
            <Account class="account" /> 
  
            <div class="flex justify-center items-center gap-5">
                <SearchBar></SearchBar>
                <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                <font-awesome-icon :icon="['fas', 'bell']" size="2xl"  />
            </div>
        </div>

        <div class="h-0.5 bg-ua-blue mb-12"></div>

        <div>This is Admin Send Copy Page.</div>
  
      </div>
    </div>
</template>