import ViewComponent from './components/ViewProductComponent.vue';
import Home from './components/ExampleComponent.vue';

export const routes = [
    { path: '/', component: Home, name: 'example-component' },
    { path: '/viewProduct', component: ViewComponent, name: 'view-product' },
    { path: '/book', component: ViewComponent, name: 'view-product' },
];
