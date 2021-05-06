// Store

import bookApi from '../../api/book'

import { router } from '../../app';


const state = {
    books: []
}

const getters = {
    allBooks: (state) => state.books
}

const actions = {
    getBookStore({ commit }) {
        bookApi.getBook((res) => {
            console.log(res)
            commit('SET_BOOKS', res)
        })
    },

    postBookStore(context, books, bool) {
        bookApi.postBook(books, (response) => {
            console.log(response);
            context.dispatch('getBookStore');
            router.push({ name: 'books' })
        })
    }
}

const mutations = {

    SET_BOOKS(state, books) {
        state.books = books
    }
}


export default {
    state,
    getters,
    actions,
    mutations,
}
