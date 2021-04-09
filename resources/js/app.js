require('./bootstrap');
import Vue from 'vue/dist/vue'
window.Vue = Vue;

import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';
import VueHtml2pdf from 'vue-html2pdf';
import 'sweetalert2/dist/sweetalert2.min.css';
import EventBus from './components/config/EventBus';
// Use Vue, Vuerouter and Axios
import { baseUri } from './components/config/baseUrl.js';
Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);
Vue.use(VueHtml2pdf);

Vue.prototype.$baseUrl = baseUri.uri;
Vue.prototype.$bus = EventBus

import App from './components/app/App.vue';
import PetugasIndex from './components/petugas/Index.vue';
import Dashboard from './components/dashboard/Index.vue';
import Books from './components/buku/Index.vue';
import BookShow from './components/buku/Show.vue';
import Laporan from './components/report/Laporan.vue';
import Login from './components/auth/Login.vue';

const routes = [
    {
        name: 'login',
        path: '/login',
        component : Login
    },
    {
        name: 'petugas',
        path: '/petugas',
        component : PetugasIndex
    },
    {
        name: 'dashboard',
        path: '/',
        component : Dashboard
    },
    {
        name: 'books',
        path: '/book',
        component : Books
    },
    {
         name: 'books.show',
         path: '/book/show/:id',
         component: BookShow
    },
    {
        name: 'report.all',
        path: '/report/all',
        component: Laporan
   }
]


const router = new VueRouter({
    mode: 'history',
    routes: routes
})
const app = new Vue(Vue.util.extend({ router }, App)).$mount('#app');
