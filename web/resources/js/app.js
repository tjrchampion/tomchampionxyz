import Vue from 'vue';
import VueRouter from 'vue-router';
import BootstrapVue from 'bootstrap-vue';
import VeeValidate from 'vee-validate';
import Bus from './Bus';

import { library } from '@fortawesome/fontawesome-svg-core'
import { faSpinner} from '@fortawesome/free-solid-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'

import App from './components/App.vue';
import Home from './components/Home.vue';


library.add(faSpinner);

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(VeeValidate);

//import css files for bootstrap-vue
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';
//import custom styles (Import SCSS/SASS if you want)
import '../css/global.css';

Vue.component('fa', FontAwesomeIcon)

let router = new VueRouter({
	routes: [
		{ path: '/', component: Home }
	]
});

const app = new Vue({
	router,
	render: createEle => createEle(App)
}).$mount('#app');