require('./bootstrap');
import Vue from 'vue';
import VueRouter from 'vue-router';
import routes from './routes';
import $ from 'jquery';
import Swal from 'sweetalert2';

window.$ = window.jQuery = $;

window.Swal = Swal;


Vue.use(VueRouter);


const app =  new Vue ({

    el: '#app',

    router: new VueRouter(routes)
});

