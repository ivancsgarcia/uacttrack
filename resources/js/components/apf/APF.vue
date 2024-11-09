<script setup>
import Galleria from "primevue/galleria";
import { ref } from "vue";

const props = defineProps({
    images: Array,
});

const responsiveOptions = ref([
    {
        breakpoint: "1300px",
        numVisible: 4,
    },
    {
        breakpoint: "575px",
        numVisible: 1,
    },
]);
</script>

<template>
    <UAHeader />

    <div class="card">
        <Galleria
            :value="images"
            :responsiveOptions="responsiveOptions"
            :numVisible="5"
            :circular="true"
            :autoPlay="true"
            containerStyle="max-width: 1000px"
        >
            <template #item="slotProps">
                <img
                    :src="slotProps.item.itemImageSrc"
                    :alt="slotProps.item.alt"
                    style="width: 100%; height: 400px"
                />
            </template>
            <template #thumbnail="slotProps">
                <img
                    :src="slotProps.item.thumbnailImageSrc"
                    :alt="slotProps.item.alt"
                    style="width: 100%; height: 50px"
                />
            </template>
        </Galleria>
    </div>
</template>

<style scoped>
.card {
    border-radius: 1rem;
}
</style>
