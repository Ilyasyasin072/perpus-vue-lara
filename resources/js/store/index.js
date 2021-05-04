import Vuex from 'vuex'
import Vue from 'vue/dist/vue'
import member from './modules/member';
import employees from './modules/employees'

Vue.use(Vuex)

export default new Vuex.Store({
    modules: {
        member,
        employees
    },
})
