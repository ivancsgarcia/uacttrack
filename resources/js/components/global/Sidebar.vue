<template>
    <div class="menu">
        <div>
            <img src="../../../../public/images/UActTrack-logo.png" alt="uacttrack-logo">

            <router-link to="" >
                <div class="border">
                    <p>Dashboard</p>
                </div>
            </router-link>

            <router-link to="" >
                <div class="border">
                    <p>Activity Proposal Form</p>
                </div>
            </router-link>

            <router-link to="" >
                <div class="border">
                    <p>Forms</p>
                </div>
            </router-link>
            
            <router-link to="" >
                <div class="border">
                    <p>Recommendation</p>
                </div>
            </router-link>
        </div>

        <div class="bottom">
            <div class="border blue">
                <p>Log Out</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .menu {
        position: fixed;
        width: 15vw;
        height: 92vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        text-align: center;
        background-color: rgba(39, 47, 92, 0.1);
    }

    img {
        width: 250px;
        margin-top: 30px;
        margin-bottom: 50px;
    }

    .border {
        border: 1px solid;
        background-color: #D9D9D9;
        text-align: center;
        font-size: 1.8rem;
        margin-bottom: 6px;
        padding: 8px;
    }
    
    .blue {
        background-color: #272F5C;
        color: #fff;
        padding: 10px;
    }
</style>