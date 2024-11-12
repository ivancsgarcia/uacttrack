<script setup>
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });
</script>

<template>
    <Head title=" | Links" />
    <div class="box-div">
        <a href="https://www.ua.edu.ph" target="_blank">
            <Card>
                <template #content>
                    <div>
                        <Image
                            :src="'images/sys-logos/ua-logo.png'"
                            alt="ua-logo"
                            width="180"
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
                            width="180"
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
                        width="180"
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
</template>

<style scoped>
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
    width: 350px;
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
