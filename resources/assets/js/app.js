import Vue from 'vue';
import VueResource from 'vue-resource';
import VeeValidate from 'vee-validate';
//import VueRouter from 'vue-router';
import App from './main.vue';
import router from './router';
//import injector from 'vue-inject';

Vue.use(VeeValidate);
Vue.use(VueResource);
window.hostname='http://preview.mahacode.com/gadwa-new';

/* eslint-disable no-new */
/*
 injector.constant('myService','3 here');

 function api(){
 Vue.http.get(window.hostname + '/ar/get-id').then(function (response) {
 //var url = apiUrlBuilder(window.hostname + '/ar/get-id');
 //return axios.get(url);
 return response;
 console.log(response);

 });
 }
 injector.service('api',api);
 */


new Vue({
    el: '#app',
    router,
    template: '<App/>',
    components: { App }

});


Vue.config.productionTip = false;
//Vue.config.delimiters = ['<%', '%>'];