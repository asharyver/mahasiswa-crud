/**!
 * @author Ashary Vermaysha
 * @copyright 2018 Ashary Vermaysha, asharyver13@gmail.com
 * @license https://opensource.org/licenses/MIT MIT
 */

/**
 * Import some dependencies
 */
import Vue from 'vue';
import VueRouter from 'vue-router';
import Axios from 'axios';
import VueAxios from 'vue-axios';
import VueHeadful from 'vue-headful';

// require('./bootstrap');
// require('./widgets.js');
// require('jquery-slim');

/**
 * Import VueJS Template
 */
import App from './App.vue';
import Header from './components/Header.vue';
import Footer from './components/Footer.vue';
import Sidebar from './components/Sidebar.vue';

/**
 * Import Configuration
 */
import routes from './routes.js';

/**
 * Router
 * @type VueRouter
 */
let Router = new VueRouter({
    hashbang: false,
    mode: 'history',
    base: __dirname,
    routes: routes,
    linkActiveClass: "",
    linkExactActiveClass: "",
});

/**
 * Error 404 Redirect
 */
Router.beforeEach((to, from, next) => {
    window.localStorage.setItem('isErrorPage', to.meta.error);
    if (to.name == null) {
        next({name: '404'});
    } else {
        next();
    }
});

/**
 * Mixins
 * @type Object
 */
let Mixins = {
    computed: {
        asset: function() {
            return asset();
        },
        appName: function() {
            return appName();
        },
        baseUrl: function() {
            return baseUrl();
        },
        APIUrl: function() {
            return apiUrl();
        },
        currentUrl: function() {
            return currentUrl();
        }
    }
};

/**
 * Axios Default configuration
 * @type String
 */
Axios.defaults.baseURL = baseUrl() + '/api/';
Axios.defaults.headers.common['Authorization'] = 'Bearer ' + window.localStorage.getItem('default_auth_token');
Axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded';


/**
 * Set Application router
 * @type VueRouter
 */
App.router = Vue.router = Router;

/**
 * Set Global Mixins (function)
 * @type Object
 */
Vue.mixin(Mixins);

/**
 * Register global components
 */
Vue.component('Headful', VueHeadful);
Vue.component('AppHeader', Header);
Vue.component('AppSidebar', Sidebar);
Vue.component('AppFooter', Footer);

/**
 * Used VueJS Plugins
 */
Vue.use(VueRouter);
Vue.use(VueAxios, Axios);
Vue.use(require('@websanova/vue-auth'), {
  auth: require('@websanova/vue-auth/drivers/auth/bearer.js'),
  http: require('@websanova/vue-auth/drivers/http/axios.1.x.js'),
  router: require('@websanova/vue-auth/drivers/router/vue-router.2.x.js'),
});

/**
 * Render Application
 */
new Vue(App).$mount('#app');
