import axios from 'axios'
import Vuex from 'vuex'
import Vue from 'vue/dist/vue'

import { baseUri } from '../components/config/baseUrl.js';

Vue.use(Vuex)

Vue.prototype.$baseUrl = baseUri.uri;

const state = {

    books: [],
    employees: [],
    members: [],
}

const getters = {
    allBooks: (state) => state.books,
    allMembers: (state) => state.members
}

const actions = {

    getProduct({commit}) {
        let uri = baseUri.uri + "buku";
        axios.get(uri).then(res => {
            commit('GET_BOOKS', res.data.result);
        })
    },

    getEmployees({commit}) {
        let uri = baseUri.uri + "petugas";
        axios.get(uri).then(res => {
            console.log( res.data.result);
            commit('SET_EMPLOYEES', res.data.result)
        })
    },


    getMembers({commit}) {
        let uri = baseUri.uri + "anggota";
        axios.get(uri).then(res => {
            console.log( res.data.result);
            commit('SET_MEMBERS', res.data.result)
        })
    },

}

const mutations = {

    GET_BOOKS(state, books) {
        state.books = books
    },

    SET_EMPLOYEES(state, employees) {
        state.employees = employees
    },

    SET_MEMBERS(state, members) {
        state.members = members
    }

}


export default new Vuex.Store({
    state,
    getters,
    actions,
    mutations,
})

// import axios from 'axios'
// import Vue from 'vue/dist/vue'
// import Vuex from 'vuex'

// var data = [
//   {
//   id: 1,
//   title: 'Shirt',
//   price: '$40'
//   },
//   {
//   id: 2,
//   title: 'Trouser',
//   price: '$10'
//   },
//   ]

// Vue.use(Vuex);
// // to handle state
// const state = {
//   posts : [],
//   products : data
// }

// // to handle state
// const getters = {
//   allProducts: (state) => state.products,
//   allPosts: (state) => state.posts
// }

// // to handle actions
// const actions = {

//   getPosts({commit}) {
//     axios.get('https://jsonplaceholder.typicode.com/posts')
//     .then(response => {
//       commit('SET_POSTS', response.data)
//       console.log(response.data)
//     })
//   }

// }

// // to handle mutations
// const mutations = {

//   SET_POSTS(state, posts) {
//     state.posts = posts
//   }

// }

// export default new Vuex.Store({
//   state,
//   getters,
//   actions,
//   mutations
// })
