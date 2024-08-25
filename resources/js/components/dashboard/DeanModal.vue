<template>
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
</template>

<script setup>
    defineProps({
        isModalOpen: {
            type: Boolean,
            required: true
        }
    })
</script>

<style scoped>
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