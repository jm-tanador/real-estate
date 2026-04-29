import { createRouter, createWebHistory } from 'vue-router'

const Login = () => import('./components/pages/login.vue');
const Dashboard = () => import('./components/pages/dashboard.vue');

// import Home from './pages/Home.vue';
// import Company from '../pages/Company.vue';

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: Login,
            name: 'login',
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'dashboard',
        },
    ]
});

export default router;
