require('./bootstrap');
import Vue from 'vue/dist/vue'
window.Vue = Vue;

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2'
import 'sweetalert2/dist/sweetalert2.min.css';
// Use Vue, Vuerouter and Axios

Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);

import App from './components/app/App.vue';
import PetugasIndex from './components/petugas/Petugas.vue';
import Dashboard from './components/dashboard/Dashboard.vue';

const routes = [
    {
        name: 'petugas',
        path: '/petugas',
        component : PetugasIndex
    },
    {
        name: 'dashboard',
        path: '/',
        component : Dashboard
    }
]


const router = new VueRouter({
    mode: 'history',
    routes: routes
})
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
