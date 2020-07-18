// require('./bootstrap');

// node_moduleのimport  
import Vue from 'vue';                                                                                                                                       

import VueRouter from 'vue-router';
// vue-routerの使用宣言  
Vue.use(VueRouter);

import axios from 'axios'
import VueAxios from 'vue-axios'
 
Vue.use(VueAxios, axios)


import App from './App.vue';



import Main from './components/Main.vue';                                                                                                        
// require('./bootstrap');                                                                                                                                              
// Window.Vue = require('vue');                                                                                                                                         
                                                                                                                                            
// ルーティングしない場合のコンポーネントの宣言  
Vue.component('example-component', require('./components/ExampleComponent.vue'));   
// ルーティングするコンポーネントの宣言  
const routes = [                                                                                                                                                                                                                                                                                                                
    {          
      name: 'Main',                                                                                                                                                             
      path: '/main',                                                                                                                                              
      component: Main                                                                                                              
    }                                                                                                                                                                                                                                                                                                                         
];                                                                                                                                                                   

const router = new VueRouter({
  routes: routes
});

new Vue(Vue.util.extend({
  router
}, App)).$mount('#app');