<script setup>
import APFHeader from '../APFHeader.vue'
import { ref } from 'vue';
import { onClickOutside } from '@vueuse/core';

const isModalOpen = ref(false);
const modal = ref(null);

onClickOutside(modal, () => (isModalOpen.value = false));
</script>

<template>
    <APFHeader title="Hello"></APFHeader>

    <form class="flex container">
        <div class="flex">
            <p class="title">You will be needing funding needs for your activity</p>
            <div class="bool">Yes</div>
            <div class="bool">No</div>
        </div>

        <div class="flex">
            <div class="name">Check Payment / Cash</div>
            <div class="radio radio1"><input type="radio" name="cash" value="yes"></div>
            <div class="radio radio2"><input type="radio" name="cash" value="no"/></div>
        </div>

        <div class="flex">
            <div class="name">Food</div>
            <div class="radio radio1"><input type="radio" name="food" value="yes"/></div>
            <div class="radio radio2"><input type="radio" name="food" value="no"/></div>
        </div>

        <div class="flex">
            <div class="name">Supplies</div>
            <div class="radio radio1"><input type="radio" name="supplies" value="yes"/></div>
            <div class="radio radio2"><input type="radio" name="supplies" value="no"/></div>
        </div>

        <div class="flex">
            <div class="name">Reproduction</div>
            <div class="radio radio1"><input type="radio" name="reproduction" value="yes"/></div>
            <div class="radio radio2"><input type="radio" name="reproduction" value="no"/></div>
        </div>

        <div class="small">
            <p>You click "YES" you will be redirected to forms to download all the projected funding needs form when you click the "Forms" button</p>
        </div>

        <div class="flex">
            <div class="div-btn">Forms</div>
            <div class="div-btn color" @click="isModalOpen = true">Next</div>
        </div>

        <Teleport to="#modal">
            <Transition name="modal">
                <div class="modal-bg" v-if="isModalOpen">
                    <div class="modal" ref="modal">
                        <h1>You Clicked "Next"</h1>
                        <p>Please ensure that you complete all the required forms before proceeding to the Activity Proposal Form.</p>
                        <div class="btns">
                            <div class="close-modal" @click="isModalOpen = false">Go Back</div>
                            <router-link>
                                <div class="next-modal">Next</div>
                            </router-link>
                        </div>
                    </div>
                </div>
            </Transition>
        </Teleport>
    </form>
</template>

<style scoped>
    .container {
        width: 100vw;
        height: 100vh;
        flex-direction: column;
        border: 1px solid black;
    }

    .flex {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
    }

    .title {
        font-size: 2rem;
        height: 80px;
        width: 500px;
        color: #272F5C;
    }

    .bool {
        background-color: #272F5C;
        width: 150px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: #fff;
        font-size: 1.2rem;
    }

    .name {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: rgba(39, 47, 92, 0.15);
        font-size: 1.5rem;
        padding: 10px;
        height: 80px;
        width: 500px;
    }

    input {
        width: 30px;
        height: 30px;
    }

    .radio {
        width: 150px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .radio1 {
        background-color: rgba(39, 47, 92, 0.7);
    }

    .radio2 {
        background-color: rgba(39, 47, 92, 0.5);
    }

    .small {
        width: 700px;
        font-size: 1rem;
    }

    .div-btn {
        display: flex;
        justify-content: center;
        align-items: center;
        width: 150px;
        height: 50px;
        border-radius: 20px;
        border: 1px solid black;
        font-size: 1.5rem;
    }

    .color {
        background-color: #272F5C;
        color: #fff;
    }

    .modal-bg {
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background-color: rgba(0, 0, 0, .5);
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .modal {
        position: relative;
        background-color: #272F5C;
        padding: 100px 20px 40px;
        border-radius: 5px;
        box-shadow: 0px 10px 5px 2px rgba(0, 0, 0, 0.1);
        color: white;
    }

    .modal-enter-active,
    .modal-leave-active {
        transition: all 0.25s ease;
    }

    .modal-enter-from,
    .modal-leave-to {
        opacity: 0;
        transform: scale(1.1);
    }

    .modal h1 {
        font-size: 2rem;
        text-align: center;
        margin-bottom: 30px;
    }

    .modal p {
        width: 400px;
        text-align: center;
        font-size: 1.4rem;
        margin-bottom: 50px;
    }

    .modal .btns {
        display: flex;
        justify-content: space-evenly;
        align-items: center
    }

    .close-modal {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #fff;
        color: #272F5C;
        width: 150px;
        height: 50px;
        border-radius: 20px;
        border: 1px solid black;
        font-size: 1.5rem;
    }

    .next-modal {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #272F5C;
        color: #fff;
        width: 150px;
        height: 50px;
        border-radius: 20px;
        border: 1px solid #fff;
        font-size: 1.5rem;
    }
</style>