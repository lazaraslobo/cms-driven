import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router';
import CreateCmsPage from '../components/admin/CreatePage.vue';
import {clientRoutes, adminRoutes, adminRoutePrefix, clientRoutePrefix} from './paths.js';

const routes: RouteRecordRaw[] = [
    {
        path: adminRoutePrefix,
        name: 'admin-routes',
        path: adminRoutes.admin_home,
        children: [
            {
                path: adminRoutes.admin_home,
                name: 'admin-home-route',
                redirect: adminRoutes.create_new_cms_page
            },
            {
                path: adminRoutes.create_new_cms_page,
                name: 'admin-create-cms-page-route',
                component: CreateCmsPage
            }
        ]
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
