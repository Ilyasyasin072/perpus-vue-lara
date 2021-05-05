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


export default {
    getMember: (cb) => getMemberApi(cb),
    saveMember: (data, cb) => saveMembersApi(data, cb),
}
