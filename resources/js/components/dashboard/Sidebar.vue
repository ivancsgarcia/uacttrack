<template>
    <div class="menu">
        <div>
            <img src="" alt="UActTrack-logo">

            <div class="border">
                <p>Dashboard</p>
            </div>
            <div class="border">
                <p>Activity Proposal Form</p>
            </div>
            <div class="border">
                <p>Forms</p>
            </div>
            <div class="border">
                <p>Recommendation</p>
            </div>
        </div>

        <div>
            <div class="border blue">
                <p>Log Out</p>
            </div>
        </div>
    </div>
</template>

<style scoped>
    .menu {
        width: 15%;
        height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        background-color: rgba(39, 47, 92, 0.1);
    }

    .border {
        border: 1px solid;
        background-color: #D9D9D9;
        text-align: center;
        font-size: 1.8rem;
        margin-bottom: 5px;
    }

    .blue {
        background-color: #272F5C;
        color: #fff;
    }
</style>