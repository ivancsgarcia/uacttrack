<script>
    import { Icon } from '@iconify/vue'
</script>

<template>
    <div class="textbox">
        <Icon icon="mdi-light:home" />
        <div class="vertical-line"></div>
        <input type="text">
    </div>
</template>

<style scoped>
    .textbox {
        border: 1px solid black;
        height: 100px;
        width: 200px;
    }

    .vertical-line {
    }
</style>
