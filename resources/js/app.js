require('./bootstrap');

window.Vue = require('vue');


Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('cart', require('./components/CartComponent.vue').default);
Vue.component('cart-list', require('./components/CartListComponent.vue').default);
Vue.component('view-product', require('./components/ViewProductComponent.vue').default);
Vue.component('book', require('./components/BookComponent.vue').default);

const app = new Vue({
    el: '#app'
});
