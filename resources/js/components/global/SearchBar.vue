<template>
    <div class="flex">
        <font-awesome-icon class="icon" :icon="['fas', 'search']" size="2xl" />
        <input type="text" placeholder="Search">
    </div>
</template>

<style scoped>
    .flex {
        display: flex;
        border: 1px solid black;
        border-radius: 12px;
    }

    .icon {
        padding: 5px 0px 5px 10px;
    }

    input {
        background-color: #272F5C;
        color: #fff;
        border-top-right-radius: 12px;
        border-bottom-right-radius: 12px;
        padding: 10px;
        font-size: 1.1rem;
    }

    input::placeholder {
        color: #fff;
        font-size: 1.1rem;
    }

</style>