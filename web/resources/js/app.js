import Vue from 'vue';
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';
import VeeValidate from 'vee-validate';

import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import bus from './bus';

library.add(faSpinner);

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(VeeValidate);

//import css files for bootstrap-vue
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
//import custom styles (Import SCSS/SASS if you want)
import '../css/global.css';


/**
 * Import vue components
 */
import App from './components/App.vue';
import Login from './components/Login.vue';
import Register from './components/Register.vue';

/**
 * Register vue components globally.
 */
Vue.component('fa', FontAwesomeIcon);
Vue.component('app', App);
Vue.component('login', Login);
Vue.component('register', Register);


const csrfToken = {
	csrf_name: document.querySelector('meta[name="csrf_name"]').getAttribute('content'),
	csrf_value: document.querySelector('meta[name="csrf_value"]').getAttribute('content')	
};


// let router = new VueRouter({
// 	routes: [
// 		{ path: '/', component: Home },
// 		{ path: '/register', component: Register }
// 	]
// });

const app = new Vue({
	el: "#app",
	mounted() {
		bus.$emit('csrf', csrfToken);
	}
});