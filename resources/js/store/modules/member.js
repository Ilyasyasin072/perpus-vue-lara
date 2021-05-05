import axios from 'axios'
import { baseUri } from '../../components/config/baseUrl';
import memberApi from '../../api/members';
import members from '../../api/members';

const uri = baseUri.uri + "anggota"

const state = {
    members: []
}

const getters = {
    allMembers: (state) => state.members
}

const actions = {

    getMembers({commit}) {
        // axios.get(uri).then(res => {
        //     commit('SET_MEMBERS', res.data.result)
        // })
        memberApi.getMember(res => {
            console.log(res);
            commit('SET_MEMBERS', res)
        })
    },

    postMembers(context,  members, bool) {
        memberApi.saveMember(members, (response) => {
            console.log(response);
            if(response.status === 200) {
                state.members = 'Data Success has Saved'
            }
            context.dispatch('getMembers');
        })
    }
}

const mutations = {

    SET_MEMBERS(state, members) {
        state.members = members
    },
}


export default {
    state,
    getters,
    actions,
    mutations
}
