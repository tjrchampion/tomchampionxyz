import Vue from "vue";
import VueRouter from "vue-router";
import BootstrapVue from "bootstrap-vue";
import VeeValidate from "vee-validate";
import VueFeather from "vue-feather";

import { library } from "@fortawesome/fontawesome-svg-core";
import { faSpinner } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

import bus from "./VueBus";

library.add(faSpinner);

Vue.use(VueRouter);
Vue.use(BootstrapVue);
Vue.use(VeeValidate);
Vue.use(VueFeather);

import "../scss/app.scss";

/**
 * Import vue components
 */
import App from "./App.vue";

/**
 * Import vue pages (components)
 */
import Home from "./pages/Home.vue";
import NotFound from "./pages/NotFound.vue";

/**
 * Register vue components globally.
 */
Vue.component("fa", FontAwesomeIcon);

const csrfToken = {
  csrf_name: document
    .querySelector('meta[name="csrf_name"]')
    .getAttribute("content"),
  csrf_value: document
    .querySelector('meta[name="csrf_value"]')
    .getAttribute("content"),
};

let router = new VueRouter({
  mode: "history",
  routes: [
    { path: "/", component: Home },
    { path: "*", component: NotFound },
  ],
});

new Vue({
  el: "#app",
  // declare components that the root component can access
  components: { App, NotFound },
  mounted() {
    bus.$emit("csrf", csrfToken);

    let nightMode = localStorage.getItem("nightMode");
    if (nightMode == null) {
      localStorage.setItem("nightMode", false);
    }

    bus.$emit("nightMode", nightMode);
  },
  // pass the template to the root component
  template: "<App />",
  // pass in the router to the Vue instance
  router,
});
