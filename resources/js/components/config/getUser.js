import axios from 'axios'

const uri = 'http://localhost:8000/api/v1/auth/users/'
const token = localStorage.getItem('token')

export  const getUser = () => {
    axios.get(uri + token).then((res) => {
        console.log(res);
    })
}
