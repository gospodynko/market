/**
 * Created by user on 02.09.17.
 */
import Vue from 'vue';
import VueResource from 'vue-resource';
import moment from 'moment';
// import VueRouter from 'vue-router';

/*components*/
import HeaderVue from './componentsUserAdmin/core/header.vue';
import MenuVue from './componentsUserAdmin/core/menu.vue';
import IndexVue from './componentsUserAdmin/main/index.vue';
import ShopsVue from './componentsUserAdmin/shops/index.vue';
import ShopsCreateVue from './componentsUserAdmin/shops/create.vue';
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');
Vue.config.silent = process.env.NODE_ENV == 'production';
Vue.config.devtools = true;
export const Events = new Vue({});
const app = new Vue({
    el: '#wrapper',
    components: {
        HeaderVue,
        MenuVue,
        IndexVue,
        ShopsVue,
        ShopsCreateVue
    }


});
