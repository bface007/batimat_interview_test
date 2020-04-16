import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import LoginPage from "./pages/LoginPage";
import HomePage from "./pages/HomePage";
import LoadingPage from "./pages/LoadingPage";

import ClientTab from './pages/home/ClientTab';
import ProviderTab from "./pages/home/ProviderTab";

const routes = [
    {
        path: '/',
        component: LoadingPage,
    },
    {
        path: '/login',
        name: 'login',
        component: LoginPage,
    },
    {
        path: '/home',
        component: HomePage,
        children: [
            {
                path: '/',
                component: ClientTab,
            }, {
                path: 'providers',
                component: ProviderTab,
            },
        ],
    }
];

export default new VueRouter({
    routes,
})


