import axios from 'axios'
import { baseUri } from '../components/config/baseUrl';
const api = axios.create({
    baseURL: baseUri.uri
})


function saveMembersApi(data, cb) {
    api.post('anggota/store', data)
        .then((res) => {
            cb(res.data.result)
        }).catch((err) => {
            console.log(err)
        })
}

function getMemberApi(cb) {
    api.get("anggota").then((res) => {
        cb(res.data.result)
    }).catch((err) => {
        cb(err)
    })
}

function updateMemberApi(idmember, data, cb) {
    api.put("anggota/update/" + idmember, data).then((res) => {
        cb({status: 201})
    }).catch((err) => {
        cb(err)
    })
}

function destroyMemberApi(idmember , cb) {
    api.delete("anggota/delete" + idmember).then((res) => {
        cb(res)
    }).catch((err) => {
        cb(err)
    })
}


export default {
    getMember: (cb) => getMemberApi(cb),
    saveMember: (data, cb) => saveMembersApi(data, cb),
    putMember: (idmember, data, cb) => updateMemberApi(idmember, data, cb),
    destroyMember: (idmember, cb) => destroyMemberApi(idmember, cb)
}
