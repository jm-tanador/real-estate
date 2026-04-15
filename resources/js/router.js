import { createRouter, createWebHistory } from 'vue-router'

const Home = () => import('./components/pages/Home.vue');
const Company = () => import('./components/pages/Company.vue');
const Login = () => import('./components/pages/Login.vue')

const router = createRouter({
    history: createWebHistory('/real-estate/'),
    base: '/real-estate/',
    routes: [
        {
            path: '/',
            component: Home,
            name: 'Home',
        },
        {
            path: '/company',
            component: Company,
            name: 'Company',
        },
        {
            path: '/login',
            component: Login,
            name: 'Login',
        }
    ]
})

export default router;