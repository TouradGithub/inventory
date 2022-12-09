import './bootstrap';
import {createApp} from 'vue/dist/vue.esm-bundler.js';
// import Reload from 'vue-loader';
import AppComponent from './App.vue'
import router from './routes'

 // Import User Class
 import User from './Helpers/User';
 window.User = User




import Swal from 'sweetalert2'
window.Swal=Swal;

const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
});
window.Toast=Toast;

// window.Reload=new Reload();
const app =createApp({

    components:{
        AppComponent,
    }

});
app.use(router);


app.mount('#app');
