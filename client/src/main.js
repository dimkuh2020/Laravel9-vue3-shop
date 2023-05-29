//import './assets/main_old.css'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'


const app = createApp(App)

app.use(router)
app.config.globalProperties.axios = axios

app.mount('#app')
