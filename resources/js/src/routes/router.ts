import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import AddPagesComp from '../components/Pages.vue';

const routes: RouteRecordRaw[] = [
    {
        path: '/',
        name: 'Home',
        component: AddPagesComp,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
