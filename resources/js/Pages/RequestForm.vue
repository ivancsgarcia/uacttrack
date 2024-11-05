<script setup>
defineProps({
    request_forms: Array,
});
</script>

<template>
    <div class="app">
        <UAHeader />
        <SideMenu />

        <div class="bg-img">
            <img :src="'images/sys-logos/ua-logo.png'" alt="UA-logo" />
        </div>

        <div class="main-content">
            <div class="account-section">
                <Account />

                <div class="icons-box">
                    <font-awesome-icon :icon="['fas', 'envelope']" size="2xl" />
                    <font-awesome-icon :icon="['fas', 'bell']" size="2xl" />
                </div>
            </div>

            <div class="vertical-line"></div>

            <h2>University of the Assumption Forms</h2>

            <table>
                <thead>
                    <tr>
                        <th>Form Titles</th>
                        <th colspan="2">Download File</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="reqForm in request_forms" :key="reqForm.id">
                        <td>{{ reqForm.name }}</td>
                        <td>docx</td>
                        <td>xlsx</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<style scoped>
.app {
    display: flex;
    padding-top: 4rem;
}

.bg-img {
    position: fixed;
    right: 0;
    bottom: 0;
    z-index: -1;
    margin-bottom: -3rem;
    margin-right: -3rem;
}

.bg-img img {
    transform: rotate(15deg);
    width: 40rem;
    filter: grayscale(100%);
    opacity: 0.1;
}

.main-content {
    min-height: calc(100vh - 64px);
    width: 100vw;
    margin-left: 16rem;
    padding: 1rem;
}

.account-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem;
}

.icons-box {
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 1.5rem;
}

.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
}

h2 {
    text-align: center;
    color: #272f5c;
    font-size: 2.2rem;
    margin: -1rem 0 0.5rem;
    letter-spacing: 0.05rem;
}

.title {
    width: 50%;
    background-color: rgba(39, 47, 92, 0.8);
    font-size: 2rem;
    padding: 10px;
    text-align: center;
    color: #fff;
}

.dl {
    width: 20%;
}

table {
    text-align: center;
    border-collapse: separate;
    width: 80%;
    margin: auto;
    border-spacing: 1rem;
}

thead {
    background-color: #272f5c;
    color: white;
}

tbody {
    background-color: #d9d9d9;
}

th,
td {
    border: 1px;
    padding: 1.2rem;
    font-size: 1.4rem;
}
</style>
