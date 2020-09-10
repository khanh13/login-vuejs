require('./bootstrap')
import Vue from 'vue'
import VueRouter from 'vue-router'
import { routes } from './routes'

Vue.use(VueRouter)

// set Vue index
import Index from './components/layouts/Index'
Vue.component('index', Index)

// Import User Class
import User from './Helpers/User'
window.User = User

// Sweet Alert start
import Swal from 'sweetalert2'
window.Swal = Swal

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: toast => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})
window.Toast = Toast

//end Sweet Alert

 // Import Notification Class
 import Notification from './Helpers/Notification';
 window.Notification = Notification

const router = new VueRouter({
    routes,
    mode: 'history'
})

const app = new Vue({
    el: '#app',
    router
})
