import axios from 'axios'
const instance = axios.create({
  baseURL: `${process.env.VUE_APP_AXIOS_URL}`,
  headers: {
    'Access-Control-Allow-Origin': '*'
  }
})
export default instance
