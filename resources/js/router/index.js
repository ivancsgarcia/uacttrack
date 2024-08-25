import { createRouter, createWebHistory} from "vue-router";
import Intro from '../components/intro/index.vue'
import NotFound from '../components/notFound.vue'
import Register from '../components/register/index.vue'
import Login from '../components/login/index.vue'
import Dashboard from '../components/dashboard/index.vue'
import Recommendation from '../components/recommendation/index.vue'
import RequestForm from '../components/request-form/index.vue'
import APF from '../components/apf/index.vue'
import APF1 from '../components/apf/apf-1/index.vue'
import APF2 from '../components/apf/apf-2/index.vue'
import APF3 from '../components/apf/apf-3/index.vue'
import APFWhole from '../components/apf/apf-whole/index.vue'

const routes = [
    {
        path: '/',
        name: 'intro.index',
        component: Intro
    },
    {
        path: '/:pathMatch(.*)*',
        name: 'notFound',
        component: NotFound
    },
    {
        path: '/register',
        name: 'register.index',
        component: Register
    },
    {
        path: '/login',
        name: 'login.index',
        component: Login
    },
    {
        path: '/dashboard',
        name: 'dashboard.index',
        component: Dashboard
    },
    {
        path: '/recommendation',
        name: 'recommendation.index',
        component: Recommendation
    },
    {
        path: '/request-form',
        name: 'request-form.index',
        component: RequestForm
    },
    {
        path: '/apf',
        name: 'apf.index',
        component: APF
    },
    {
        path: '/apf-1',
        name: 'apf-1.index',
        component: APF1
    },
    {
        path: '/apf-2',
        name: 'apf-2.index',
        component: APF2
    },
    {
        path: '/apf-3',
        name: 'apf-3.index',
        component: APF3
    },
    {
        path: '/apf-whole',
        name: 'apf-whole.index',
        component: APFWhole
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router