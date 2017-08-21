import Vue from 'vue';
import VueResource from 'vue-resource';
import moment from 'moment';
// import VueRouter from 'vue-router';

/*components*/
import HeaderVue from './components/core/header.vue';
import FooterVue from './components/core/footer.vue';
import MainVue from './components/index/main.vue';
import ProductVue from './components/product/product.vue';
import ProductList from './components/product/prod-list.vue';
import ProductListFeedback from './components/product/prod-list-feedback.vue';
import SearchVue from './components/search/search.vue';
import CartVue from './components/cart/cart.vue';
// Vue.use(VueSocketio, 'http://localhost:8303');
// Vue.use(VueRouter);
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

export const Events = new Vue({});
const app = new Vue({
    el: '#app',
    components: {
        HeaderVue,
        FooterVue,
        MainVue,
        ProductVue,
        ProductList,
        ProductListFeedback,
        SearchVue,
        CartVue
    }


});
