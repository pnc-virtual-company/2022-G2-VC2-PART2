import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import './index.css'
import VueAwesomePaginate from "vue-awesome-paginate";
import "vue-awesome-paginate/dist/style.css";
import VueCryptojs from 'vue-cryptojs'
import VueCookies from 'vue3-cookies'
import { createPinia } from 'pinia'

const app = createApp(App).use(createPinia())
app.use(router)
app.use(VueAwesomePaginate)
app.use(VueCryptojs)
app.use(VueCookies, {
    expireTimes: "1h",
})
app.mount('#app')
