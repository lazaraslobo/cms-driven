import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import CreateCmsPage from '../components/admin/CreatePage.vue';
import {clientRoutes, adminRoutes} from './paths.js';

const routes: RouteRecordRaw[] = [
    {
        path: adminRoutes.admin_home,
        name: 'admin-home-route',
        component: CreateCmsPage,
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
