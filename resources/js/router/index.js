import { createRouter, createWebHistory} from "vue-router";
import intro from '../components/intro/index.vue'
import notFound from '../components/notFound.vue'
import register from '../components/register/index.vue'

const routes = [
    {
        path: '/',
        name: 'intro.index',
        component: intro
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notFound',
        component: notFound
    },
    {
        path: '/try',
        name: 'register.index',
        component: register
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router