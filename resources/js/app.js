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

import router from "./routes";

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

Vue.component('list-clients', require('./components/ListClients').default);
Vue.component('modify-client', require('./components/ModifyClient').default);
Vue.component('view-client', require('./components/ViewClient').default);
Vue.component('insert-client', require('./components/InsertClient').default);

Vue.component('list-company', require('./components/ListCompanies').default);
Vue.component('modify-company', require('./components/ModifyCompany').default);
Vue.component('view-company', require('./components/ViewCompany').default);
Vue.component('insert-company', require('./components/InsertCompany').default);

Vue.component('modify-detail-line', require('./components/ModifyDetailLine').default);
Vue.component('view-detail-line', require('./components/ViewDetailLine').default);

// Vue.component('list-sale-detail', require('./components/ListDetailLines').default);
// Vue.component('modify-sale-detail', require('./components/ModifyDetailLine').default);
// Vue.component('view-sale-detail', require('./components/ViewDetailLine').default);
// Vue.component('insert-sale-detail', require('./components/InsertDetailLine').default);

Vue.component('list-drug', require('./components/ListDrugs').default);
Vue.component('modify-drug', require('./components/ModifyDrug').default);
Vue.component('view-drug', require('./components/ViewDrug').default);
Vue.component('insert-drug', require('./components/InsertDrug').default);

Vue.component('list-inventory', require('./components/ListInventories').default);
Vue.component('modify-inventory', require('./components/ModifyInventory').default);
Vue.component('view-inventory', require('./components/ViewInventory').default);
Vue.component('insert-inventory', require('./components/InsertInventory').default);

Vue.component('list-provider', require('./components/ListProviders').default);
Vue.component('modify-provider', require('./components/ModifyProvider').default);
Vue.component('view-provider', require('./components/ViewProvider').default);
Vue.component('insert-provider', require('./components/InsertProvider').default);

Vue.component('list-sale', require('./components/ListSales').default);
Vue.component('modify-sale', require('./components/ModifySale').default);
Vue.component('view-sale', require('./components/ViewSale').default);
Vue.component('insert-sale', require('./components/InsertSale').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router
});
