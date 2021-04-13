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
import Carousel3d from 'vue-carousel-3d';
import UniqueId from 'vue-unique-id';
import Vuex from 'vuex';
// Use Vue, Vuerouter and Axios
import { baseUri } from './components/config/baseUrl.js';
import store from './components/config/store';

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);
Vue.use(VueHtml2pdf);
Vue.use(Carousel3d);
Vue.use(UniqueId);

Vue.prototype.$baseUrl = baseUri.uri;
Vue.prototype.$bus = EventBus

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import App from './components/app/App.vue';
import Home from './components/home/Index.vue';
import Petugas from './components/petugas/Index.vue';
import Dashboard from './components/dashboard/Index.vue';
import Books from './components/buku/Index.vue';
import BookShow from './components/buku/Show.vue';
import Login from './components/auth/Login.vue';
import Peminjaman from './components/peminjaman/Index.vue';
import Pengembalian from './components/pengembalian/Index.vue';
import Rak from './components/rak/Index.vue';
import Laporan from './components/report/Laporan.vue';
import CreateBuku from './components/buku/create.vue';

const routes = [
    {
        name: 'login',
        path: '/login',
        component : Login
    },
    {
        name: 'home',
        path: '/homes',
        component : Home
    },
    {
        name: 'employee',
        path: '/employee',
        component : Petugas
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
    },{
        name: 'books.create',
        path: '/book/create',
        component : CreateBuku
    },
    {
         name: 'books.show',
         path: '/book/show/:id',
         component: BookShow
    },
    {
        name: 'borrowing',
        path: '/borrowing',
        component: Peminjaman
    },
    {
        name: 'repayment',
        path: '/repayment',
        component: Pengembalian
    },
    {
        name: 'bookcase',
        path: '/bookcase',
        component: Rak
    },
    {
        name: 'report.all',
        path: '/report/all',
        component: Laporan
   }
]


const router = new VueRouter({
    mode: 'history',
    routes: routes,
})
const app = new Vue(Vue.util.extend({ router , store }, App)).$mount('#app');
