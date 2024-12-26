<script setup>
import Layout from "../Layouts/Layout.vue";

defineOptions({ layout: Layout });
</script>

<template>
    <Head title=" | Links" />
    <div class="flex flex-wrap justify-center gap-4">
        <a href="https://www.ua.edu.ph" target="_blank">
            <Card class="w-72 h-72">
                <template #content>
                    <Image
                        :src="'images/sys-logos/ua-logo.png'"
                        alt="ua-logo"
                        width="180"
                    />
                    <p>University of the Assumption Website</p>
                </template>
            </Card>
        </a>

        <a
            href="http://serp.ua.edu.ph/serp/Gate/UASFP.Login.aspx"
            target="_blank"
        >
            <Card class="w-72 h-72">
                <template #content>
                    <Image
                        :src="'images/sys-logos/ua-logo.png'"
                        alt="ua-logo"
                        width="180"
                    />
                    <p>University of the Assumption SERP</p>
                </template>
            </Card>
        </a>

        <Card class="w-72 h-72">
            <template #content>
                <Image
                    :src="'images/sys-logos/ua-logo.png'"
                    alt="rsointrack-logo"
                    width="180"
                />
                <p>RSO in Track</p>
            </template>
        </Card>

        <Card class="w-72 h-72"> </Card>
        <Card class="w-72 h-72"> </Card>
        <Card class="w-72 h-72"> </Card>

        <Card class="w-72 h-72"> </Card>
        <Card class="w-72 h-72"> </Card>
        <Card class="w-72 h-72"> </Card>
    </div>
</template>

<style scoped>
.vertical-line {
    height: 0.125rem;
    background-color: #272f5c;
    margin-bottom: 3rem;
}
</style>
