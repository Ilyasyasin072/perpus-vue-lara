import axios from 'axios'
import { baseUri } from '../components/config/baseUrl'

const api = axios.create({
    baseURL: baseUri.uri
})


function getEmployeeApi(cb) {
    api.get("petugas").then((res) =>{
        cb(res.data.result)
    }).catch((err) => {
        cb(err)
    })
}

function postEmployeeApi(data, cb) {
    api.get("petugas/store", data).then((res) => {
        cb(res.data.result)
    }).catch((err) => {
        cb(err)
    })
}


export default {
    getEmployee : (cb) => getEmployeeApi(cb),
    postEmployee: (data, cb) => postEmployeeApi(data, cb)
}
