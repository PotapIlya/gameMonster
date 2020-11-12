/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
// require('./script')
// require('./persone/scripts')
// require('./persone/swiper')

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('auth-register-component', require('./components/auth/AuthRegisterComponent.vue').default);
Vue.component('auth-login-component', require('./components/auth/AuthLoginComponent.vue').default);
Vue.component('app-my-component', require('./components/user/my/AppComponent').default);


/** Header */

Vue.component('search-component', require('./components/base/header/SearchComponent').default);


/** Modal */

Vue.component('modal-auth-component', require('./components/base/modal/ButtonsAuthComponent').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
