import { createRouter, createWebHistory } from 'vue-router'

import LoginView from '@/views/LoginView.vue'
import RegisterView from '@/views/RegisterView.vue'
import DashView from '@/views/PrincipalView.vue'
import ClientesView from '@/views/ClientesView'


const routes = [{
        path: "/",
        component: LoginView
    },
    {
        path: "/register",
        component: RegisterView
    },
    {
        path: "/dash",
        component: DashView
    },
    {
        path: "/clientes",
        component: ClientesView
    },
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

export default router