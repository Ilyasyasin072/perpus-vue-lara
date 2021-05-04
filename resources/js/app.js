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
import VueGoodTablePlugin from 'vue-good-table';
import 'vue-good-table/dist/vue-good-table.css'

import store from './store/index';
import VModal from 'vue-js-modal'
import 'vue-js-modal/dist/styles.css'

Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(VueSweetalert2);
Vue.use(VueAxios, axios);
Vue.use(VueHtml2pdf);
Vue.use(Carousel3d);
Vue.use(UniqueId);
Vue.use(VueGoodTablePlugin);
Vue.use(VModal)

Vue.prototype.$baseUrl = baseUri.uri;
Vue.prototype.$bus = EventBus

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

import App from './components/app/App.vue';
import Home from './components/home/Index.vue';
import Petugas from './components/petugas/Index.vue';
import Anggota from './components/anggota/Index.vue';
import Dashboard from './components/dashboard/Index.vue';
import Books from './components/buku/Index.vue';
import BookShow from './components/buku/Show.vue';
import Login from './components/auth/Login.vue';
import Peminjaman from './components/peminjaman/Index.vue';
import Pengembalian from './components/pengembalian/Index.vue';
import Rak from './components/rak/Index.vue';
import Laporan from './components/report/Laporan.vue';
import CreateBuku from './components/buku/create.vue';
import { fromJSON } from 'postcss';

const uri = 'http://localhost:8000/api/v1/auth/users/'
const token = localStorage.getItem('token')

const router = new VueRouter({
    mode: 'history',
    // routes: routes,
    routes: [
        {
            name: 'login',
            path: '/login',
            component: Login,
            meta: {
                guest: true
            }
        },
        {
            name: 'home',
            path: '/homes',
            component: Home,
            meta: {
                guest: true
            }
        },
        {
            name: 'member',
            path: '/member',
            component: Anggota,

            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'employee',
            path: '/employee',
            component: Petugas,

            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'dashboard',
            path: '/',
            component: Dashboard,
            meta: {
                guest: true
            }
        },
        {
            name: 'books',
            path: '/book',
            component: Books,
            meta: {
                requiresAuth: true
            }
        }, {
            name: 'books.create',
            path: '/book/create',
            component: CreateBuku,

            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'books.show',
            path: '/book/show/:id',
            component: BookShow
        },
        {
            name: 'borrowing',
            path: '/borrowing',
            component: Peminjaman,

            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'repayment',
            path: '/repayment',
            component: Pengembalian,

            meta: {
                requiresAuth: true
            }
        },
        {
            name: 'bookcase',
            path: '/bookcase',
            component: Rak
        },
        {
            name: 'report.all',
            path: '/report/all',
            component: Laporan,

            meta: {
                requiresAuth: true
            }
        },
        { path: '*', redirect: '/dashboard' }
    ]
})

router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.requiresAuth)) {
        if (localStorage.getItem('token') == null) {
            next({
                path: '/login',
                params: { nextUrl: to.fullPath }
            })
        } else {
            let user = JSON.parse(localStorage.getItem('getuser'));
                if (user) {
                    next()
                } else {
                    next({
                        path: '/login',
                        params: { nextUrl: to.fullPath }
                    })
                }

        }
    } else if (to.matched.some(record => record.meta.guest)) {
        if (localStorage.getItem('token') == null) {
            next()
        }
        else {
            next()
        }
    } else {
        next()
    }
})
const app = new Vue(Vue.util.extend({ router, store }, App)).$mount('#app');
