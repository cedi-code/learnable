
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
import Buefy from 'buefy'


Vue.use(Buefy);

Vue.component('example', require('./components/Example.vue'));
Vue.component('logo-anim', require('./components/intro.vue'));
Vue.component('user-tile', require('./components/userTile.vue'));
Vue.component('termin-box', require('./components/terminBox'));
Vue.component('table-box', require('./components/table'));
Vue.component('group-box', require('./components/groupTable'));
Vue.component('termin-liste', require('./components/groupTable'));
Vue.component('create-group', require('./components/gruppeErstellen'));
Vue.component('tag-user', require('./components/tagUser'));

const app = new Vue({
    el: '#app'
});
