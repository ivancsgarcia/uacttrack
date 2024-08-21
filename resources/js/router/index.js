import { createRouter, createWebHistory} from "vue-router";
import intro from '../components/intro/index.vue'
import notFound from '../components/notFound.vue'
import dashboard from '../components/dashboard/index.vue'

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
        path: '/dashboard',
        name: 'dashboard.index',
        component: dashboard
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router