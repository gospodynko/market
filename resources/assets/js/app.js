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
import AdminCategories from './components/dashboard/categories/index.vue';
import AdminHeader from './components/dashboard/core/header.vue';
import AdminModeration from './components/dashboard/moderations/index.vue';
import AdminModerationEdit from './components/dashboard/moderations/edit.vue';
import AdminModerationView from './components/dashboard/moderations/show.vue';
import PaymentsList from './components/dashboard/payments/index.vue';
import DeliveriesList from './components/dashboard/deliveries/index.vue';
import AdminBanners from './components/dashboard/banners/index.vue';
import AdminBannersCreate from './components/dashboard/banners/create.vue';
import CartCheckoutVue from './components/cart/cart-checkout.vue';
import PaymentsCreate from './components/dashboard/payments/create.vue';
import DeliveriesCreate from './components/dashboard/deliveries/create.vue';
import ProductCreate from './components/dashboard/products/create.vue';
import AdminProductEdit from './components/dashboard/products/edit.vue';
import AdminUserProductEdit from './components/dashboard/products/user-edit.vue';
import DashboardCategoriesEdit from './components/dashboard/categories/edit.vue';
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
        CartVue,
        AdminCategories,
        AdminHeader,
        AdminModeration,
        AdminModerationView,
        AdminBanners,
        AdminBannersCreate,
        CartCheckoutVue,
        DeliveriesList,
        PaymentsList,
        PaymentsCreate,
        DeliveriesCreate,
        ProductCreate,
        DashboardCategoriesEdit,
        AdminProductEdit,
        AdminUserProductEdit
    }


});
