/**
 * Created by user on 02.09.17.
 */
import Vue from 'vue';
import VueResource from 'vue-resource';
import moment from 'moment';
// import VueRouter from 'vue-router';

/*components*/

Vue.use(VueResource);

Vue.http.headers.common['X-CSRF-TOKEN'] = $('meta[name="csrf-token"]').attr('content');

export const Events = new Vue({});
const app = new Vue({
    el: '#app',
    components: {
    }


});
