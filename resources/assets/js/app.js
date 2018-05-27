
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueResource from 'vue-resource';

Vue.use(VueResource);

Vue.component('list-group', require('./components/ListGroup.vue'));

Vue.component('black-list', require('./components/BlackList.vue'));

const app = new Vue({
    el: '#app'
});
