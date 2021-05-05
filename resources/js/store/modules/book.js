// Store

import bookApi from '../../api/book'

const state = {
    books: []
}

const getters = {
    allBooks: (state) => state.books
}

const actions = {
    getBookStore({commit}) {
        bookApi.getBook(res => {
            commit('SET_BOOKS', res)
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
