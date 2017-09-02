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
Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

export const Events = new Vue({});
const app = new Vue({
    el: '#wrapper',
    components: {
        HeaderVue,
        MenuVue
    }


});
