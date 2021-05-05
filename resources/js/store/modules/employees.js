// STORE

import axios from 'axios'
import employeeApi from '../../api/employee'

const state = {
    employees: [],
}

const getters = {
    allEmployees: (state) => state.employees
}

const actions = {

    getEmployees({commit}) {
        // axios.get(uri).then(res => {
        //     commit('SET_EMPLOYEES', res.data.result)
        // })
        employeeApi.getEmployee(res => {
            commit('SET_EMPLOYEES', res)
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
