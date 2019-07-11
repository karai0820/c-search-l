/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import router from './router';
import Top from './components/top.vue';
import firebase from 'firebase';


Vue.config.produtionTip = false;

  // Initialize Firebase 
  var firebaseConfig = {
    apiKey: "AIzaSyBAIDcHgGTK76anTyB88qmET3Hpk4-eVt8",
    authDomain: "c-search-e6071.firebaseapp.com",
    databaseURL: "https://c-search-e6071.firebaseio.com",
    projectId: "c-search-e6071",
    storageBucket: "",
    messagingSenderId: "651199615863",
    appId: "1:651199615863:web:ed26f77185fca975"
  };

  firebase.initializeApp(firebaseConfig);

const app = new Vue({
    el:'#vueapp',
    router,
    components:{Top}
});
