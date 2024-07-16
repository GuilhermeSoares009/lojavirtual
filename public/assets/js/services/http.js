import axios from 'axios';

const axiosInstance = axios.create({
  headers: {
    'Content-type': 'application/json',
    'X-Requested-With':'XMLHttpRequest'
  },
  baseUrl: 'http://localhost:8000'
});

export default axiosInstance;