import axios from 'axios'
import { baseUri } from '../../components/config/baseUrl';

const uri = baseUri.uri + "anggota"

const state = {
    members: []
}

const getters = {
    allMembers: (state) => state.members
}

const actions = {
    getMembers({commit}) {
        axios.get(uri).then(res => {
            commit('SET_MEMBERS', res.data.result)
        })
    }
}

const mutations = {

    SET_MEMBERS(state, members) {
        state.members = members
    }
}


export default {
    state,
    getters,
    actions,
    mutations
}
