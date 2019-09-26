/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import BootstrapVue from 'bootstrap-vue' 

window.Vue = require('vue');
import Vue from 'vue'
import Vuelidate from 'vuelidate'
Vue.use(Vuelidate)
Vue.use(BootstrapVue)


import { library } from "@fortawesome/fontawesome-svg-core";
import { faBars, faPlusCircle,faComment,faThumbsUp,faEdit,faTrash } from "@fortawesome/free-solid-svg-icons";

import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

library.add(faBars);
library.add(faComment);
library.add(faPlusCircle);
library.add(faThumbsUp);
library.add(faEdit);
library.add(faTrash);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i) 
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('addidea-component', require('./components/AddIdeaComponent.vue').default);
Vue.component('card-component', require('./components/CardComponent.vue').default);
Vue.component('cards-component', require('./components/CardsComponent.vue').default);
Vue.component('card-detail-component', require('./components/CardDetailViewComponent.vue').default);
Vue.component('editidea-component', require('./components/EditIdeaComponent.vue').default);
Vue.component('likeicon-component', require('./components/LikeIconComponent.vue').default);
Vue.component('ideatitle-component', require('./components/IdeaTitleComponent.vue').default);
Vue.component('ideadescription-component', require('./components/IdeaDescriptionComponent.vue').default);
Vue.component('editicon-component', require('./components/EditIconComponent.vue').default);
Vue.component('deleteicon-component', require('./components/DeleteIconComponent.vue').default);
Vue.component("font-awesome-icon", FontAwesomeIcon);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
