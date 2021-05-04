import axios from 'axios'
import { baseUri } from '../../components/config/baseUrl';

const uri = baseUri.uri + "petugas"

const state = {
    employees: [],
}

const getters = {
    allEmployees: (state) => state.employees
}

const actions = {

    getEmployees({commit}) {
        axios.get(uri).then(res => {
            commit('SET_EMPLOYEES', res.data.result)
        })
    },

}

const mutations = {

    SET_EMPLOYEES(state, employees) {
        state.employees = employees
    },

}

export default {
    state,
    getters,
    actions,
    mutations
}
