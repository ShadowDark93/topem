import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import DashView from '@/views/DashboardView.vue'


const routes = [{
        path: "/",
        component: LoginView
    },
    {
        path: "/register",
        component: RegisterView
    },
    {
        path: "/dasboard",
        component: DashView
    },
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router