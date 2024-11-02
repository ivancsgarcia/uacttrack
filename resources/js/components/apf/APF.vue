<script setup>
import Galleria from 'primevue/galleria';
import { ref } from 'vue';


const images = ref([
    {
        itemImageSrc: 'https://via.placeholder.com/640x360?text=Image+1',
        thumbnailImageSrc: 'https://via.placeholder.com/150x100?text=Thumb+1',
        alt: 'Image 1',
        title: 'Title 1'
    },
    {
        itemImageSrc: 'https://via.placeholder.com/640x360?text=Image+2',
        thumbnailImageSrc: 'https://via.placeholder.com/150x100?text=Thumb+2',
        alt: 'Image 2',
        title: 'Title 2'
    }
]);

const responsiveOptions = ref([
    {
        breakpoint: '1300px',
        numVisible: 4
    },
    {
        breakpoint: '575px',
        numVisible: 1
    }
]);
</script>

<template>
    <UAHeader />

    <div class="card">
        <Galleria :value="images" :responsiveOptions="responsiveOptions" :numVisible="5" containerStyle="max-width: 640px">
            <template #item="slotProps">
                <img :src="slotProps.item.itemImageSrc" :alt="slotProps.item.alt" style="width: 100%" />
            </template>
            <template #thumbnail="slotProps">
                <img :src="slotProps.item.thumbnailImageSrc" :alt="slotProps.item.alt" />
            </template>
        </Galleria>
    </div>
</template>

<style scoped>
.card {
    /* position: relative; */
    background-color: #272f5c;
    border-radius: 0.5rem;
    /* display: flex;
    justify-content: center;
    align-items: center;
    margin: auto 4rem; */
}

.img {
    /* margin-left: 2rem; */
}
</style>
