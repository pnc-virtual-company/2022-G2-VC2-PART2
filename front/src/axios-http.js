import axios from "axios";
import { useUserStore } from "./store/index.js";
const axiosClient = axios.create({
  baseURL: process.env.VUE_APP_API_URL,
});

axiosClient.interceptors.request.use((config) => {
  const user = useUserStore();
  config.headers.Authorization = "Bearer " + user.token;
  return config;
});

export default axiosClient;
