<script setup>
import { Link } from "@inertiajs/vue3";
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

            <div class="box-div">
                <a href="https://www.ua.edu.ph" target="_blank">
                    <Card>
                        <template #content>
                            <div>
                                <Image
                                    :src="'images/sys-logos/ua-logo.png'"
                                    alt="ua-logo"
                                    width="200"
                                />
                                <p>University of the Assumption Website</p>
                            </div>
                        </template>
                    </Card>
                </a>

                <a
                    href="http://serp.ua.edu.ph/serp/Gate/UASFP.Login.aspx"
                    target="_blank"
                >
                    <Card>
                        <template #content>
                            <div>
                                <Image
                                    :src="'images/sys-logos/ua-logo.png'"
                                    alt="ua-logo"
                                    width="200"
                                />
                                <p>University of the Assumption SERP</p>
                            </div>
                        </template>
                    </Card>
                </a>

                <Card>
                    <template #content>
                        <div>
                            <Image
                                :src="'images/sys-logos/ua-logo.png'"
                                alt="rsointrack-logo"
                                width="200"
                            />
                            <p>RSO in Track</p>
                        </div>
                    </template>
                </Card>

                <Card> </Card>
                <Card> </Card>
                <Card> </Card>

                <Card> </Card>
                <Card> </Card>
                <Card> </Card>
            </div>
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

.account-section {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin: 1rem;
}

.main-content {
    min-height: calc(100vh - 64px);
    width: 100vw;
    margin-left: 16rem;
    padding: 1rem;
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

.box-div {
    flex: 1 1 calc(33.333% - 20px);
    display: flex;
    /* flex-direction: column; */
    justify-content: center;
    flex-wrap: wrap;
    gap: 1rem;
}

.p-card {
    padding: 1rem;
    background-color: #272f5c;
    color: white;
    width: 400px;
    height: 300px;
}

.p-card div {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    gap: 0.5rem;
}
</style>
