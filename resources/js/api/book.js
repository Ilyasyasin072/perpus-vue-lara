import axios from 'axios'
import { baseUri } from '../components/config/baseUrl'

const api = axios.create({
    baseURL: baseUri.uri
})


function getBooksApi(cb) {

    api.get("buku").then((res) => {
        cb(res.data.result)
    }).catch((err) => {
        cb(err)
    })
}


export default {
    getBook = (cb) => getBooksApi(cb),
}
