import axios from 'axios';

const axiosClient = axios.create({
    baseURL: 'http://127.0.0.1:8000/api'//import.meta.env.API_BASE_URL
})

axiosClient.interceptors.request.use((config) => {
    const token = localStorage.getItem("ACCESS_TOKEN")
    config.headers.Authorization = `Bearer ${token}`
    return config;
})

axiosClient.interceptors.response.use((response) => {
    return response;
    }, (error) => {
        try{
            const {response} = error;
            if (response.status === 401) {
                // localStorage.removeItem("ACCESS_TOKEN");
                // window.location.href = "/login";
            }
            if (response.status === 403) {
                // localStorage.removeItem("ACCESS_TOKEN");
                // window.location.href = "/login";
            }    
        }
        catch(error){
            console.log(error);
        }
         throw error;
    });

export default axiosClient;