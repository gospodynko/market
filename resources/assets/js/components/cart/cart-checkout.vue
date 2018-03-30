<template>
    <section class="cart-checkout-sect">
        <div class="cart-checkout-wrap" v-if="!showSuccess">
            <div class="breadcrumbs"></div>
            <div class="all-items-cart-wrap">
                <div class="checkout-user-wrap">
                    <h2>{{translate.goods_in_cart}}</h2>
                    <!--<div class="product-list">-->
                        <!--<div class="single-product" v-for="item in cartItems" @click="setItem(item)" :class="{'active': item.store.id == checketStoreId}">-->
                            <!--<div class="logo">-->
                                <!--<img :src="item.product.default_picture" alt="">-->
                            <!--</div>-->
                            <!--<div class="title">-->
                                <!--<p>{{getName(item.product.name)}}</p>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <div class="product-list">
                        <swiper :options="swiperOption" ref="mySwiper">
                            <swiper-slide v-for="item in cartItems">
                                <div class="single-product" @click="setItem(item)" :class="{'active': item.store.id == checketStoreId}">
                                    <div class="logo">
                                        <img :src="item.product.default_picture" :alt="item.product.name">
                                    </div>
                                    <div class="title">
                                        <p>{{getName(item.product.name)}}</p>
                                    </div>
                                </div>
                            </swiper-slide>
                            <div class="swiper-button-next" slot="button-next">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44">
                                    <path d="M27,22L27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22z" fill="#14c44d"/>
                                </svg>
                            </div>
                            <div class="swiper-button-prev" slot="button-prev">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44">
                                    <path d="M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z" fill="#14c44d"/>
                                </svg>
                            </div>
                        </swiper>
                    </div>
                    <div class="checked-product">
                        <div class="image-prod">
                            <img :src="checkedItem.product.default_picture" :alt="checkedItem.product.name">
                        </div>
                        <div class="detail-description">
                            <div class="head">
                                <p class="title">{{checkedItem.product.name}}</p>
                                <p class="shop-title">Магазин {{checkedItem.store.shop ? checkedItem.store.shop.name : ''}}</p>
                            </div>
                            <div class="footer">
                                <p class="price">{{checkedItem.store.price * checkedItem.store.store_count}} {{checkedItem.store.currency.name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-user-fields">
                    <h2>{{translate.buyer_data}}</h2>
                    <div class="field-list">
                        <p>
                            <span>{{translate.name}} *</span>
                            <input type="text" v-model="checkedItem.data.user.first_name" :class="{'error': errors.first_name}">
                        </p>
                        <p>
                            <span>{{translate.last_name}} *</span>
                            <input type="text" v-model="checkedItem.data.user.last_name" :class="{'error': errors.last_name}">
                        </p>
                    </div>
                    <div class="field-list">
                        <p>
                            <span>{{translate.phone}} *</span>
                            <masked-input mask="\+\38 (111) 111-11-11" v-model="checkedItem.data.user.phone"  :class="{'error': errors.phone}"></masked-input>
                            <!--<input type="text" v-model="checkedItem.data.user.phone" :class="{'error': errors.phone}">-->
                        </p>
                        <p>
                            <span>{{translate.email}} *</span>
                            <input type="email" v-model="checkedItem.data.user.email" :class="{'error': errors.email}">
                        </p>
                    </div>
                </div>
                <div class="buy-credit">
                    <!--
                    <div class="flex-checkbox-buy-credit">
                        <input type="checkbox" id="checkbox-buy-credit" style="width:25px;height:20px;"/>
                        <label for="checkbox-buy-credit"  @click="creditClick">
                            <button>Купити в кредит</button>
                        </label>
                    </div>
                    -->
                    <div id="checkbox-buy-credit"   @click="creditClick">
                        <!--<img class="credit-nook" src="/img/nook.png"/>-->
                        <!--<img src="/img/ok.png" class="credit-ok" />-->
                        <button>Купити в кредит</button>
                    </div>
                    <div class="application-credit"  :class="{'open': showApplicationForm}" v-if="showApplicationForm">
                        <div class="credit-conditions">
                            <div class="reg-obl">
                                <p>Де Ви зареєстровані?</p>
                                <div class="obl-select">
                                    <div class="select-side">
                                        <i class="obl obl-menu-down gray">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 37 27"><g><g transform="translate(-570 -284)"><image width="37" height="27" transform="translate(570 284)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAbCAYAAAD77kbeAAACCElEQVRYR+2V30sUURSAvxlStz9A01LbkKByyzUxA0Ux3IyKwsrMZPsB/j1FkVjpshYmJmIvPUiksFtL6EMUJUEvET3G7po/Vne2mYk7NLGQ5b1sQdAMzNMc5nz3O+eeo9m2bfOPPZoHJVkRz5SkKDxTnilZA7Jx/2dPiYWhaZqsJCdOyZRIYJqmk0TX9U2TWZaNZZlOrHhlH2kosSE/J5NcuzXM4cZ6Oo+04vOVbAjmrtP5l68ZffiIjrZmTh0PbXoIF1oBymZkbJLpp3FWMxn6wz0cC7VRUlz8UzLTtHj1ZoGbd0ZIpRZpbT7EpQtn2FZWKiVLCcqyLO5Gx5h99oL1rMGVi+c40dn+A0wYEjFv373nxmCUZDpNY32dA1RVWfHnTYkjOj31HSyWmGM1s8bl3rMO2Fafj6+myYIAuh0llV6kqSHofK8oL/s7PeV6d21EH0zyZDbO2nrWSRxqb+HDx09cH4iwtLJCMLCPcE8Xu/xV0oaUeyq/GVywoXvjzMQSZI0cXSePEns+x5elZQ4GA/R1n8ZfXalkqCCo/FJG7o8zPRPHMHIUFW2hoS7A1b5udmwvVzZUMJQLJhp7MDJKLDHP7ho//eHz+HdWo+tqAzO/EtK371d3WZTSyOWYmHrM/to9HKjdWxCQ8kT/3ZBxB6bqStnonwWbkpqGikEelKwwz5SsqW8fvjC/keZcfgAAAABJRU5ErkJggg=="/></g></g></svg>
                                        </i>
                                    </div>
                                    <select class="form-control" id="sel1">
                                        <option><p>Дніпропетровська</p></option>
                                        <option><p>Київська</p></option>
                                        <option><p>Полтавська</p></option>
                                    </select>
                                </div>
                            </div>
                            <div class="credit-union">
                                <p>Кредитний союз "Агрокредит"</p>
                                <div>
                                    <div class="credit-union-select">
                                        <div class="select-side">
                                            <i class="credit-union-down gray">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 37 27"><g><g transform="translate(-570 -284)"><image width="37" height="27" transform="translate(570 284)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAbCAYAAAD77kbeAAACCElEQVRYR+2V30sUURSAvxlStz9A01LbkKByyzUxA0Ux3IyKwsrMZPsB/j1FkVjpshYmJmIvPUiksFtL6EMUJUEvET3G7po/Vne2mYk7NLGQ5b1sQdAMzNMc5nz3O+eeo9m2bfOPPZoHJVkRz5SkKDxTnilZA7Jx/2dPiYWhaZqsJCdOyZRIYJqmk0TX9U2TWZaNZZlOrHhlH2kosSE/J5NcuzXM4cZ6Oo+04vOVbAjmrtP5l68ZffiIjrZmTh0PbXoIF1oBymZkbJLpp3FWMxn6wz0cC7VRUlz8UzLTtHj1ZoGbd0ZIpRZpbT7EpQtn2FZWKiVLCcqyLO5Gx5h99oL1rMGVi+c40dn+A0wYEjFv373nxmCUZDpNY32dA1RVWfHnTYkjOj31HSyWmGM1s8bl3rMO2Fafj6+myYIAuh0llV6kqSHofK8oL/s7PeV6d21EH0zyZDbO2nrWSRxqb+HDx09cH4iwtLJCMLCPcE8Xu/xV0oaUeyq/GVywoXvjzMQSZI0cXSePEns+x5elZQ4GA/R1n8ZfXalkqCCo/FJG7o8zPRPHMHIUFW2hoS7A1b5udmwvVzZUMJQLJhp7MDJKLDHP7ho//eHz+HdWo+tqAzO/EtK371d3WZTSyOWYmHrM/to9HKjdWxCQ8kT/3ZBxB6bqStnonwWbkpqGikEelKwwz5SsqW8fvjC/keZcfgAAAABJRU5ErkJggg=="/></g></g></svg>
                                            </i>
                                        </div>
                                        <select class="form-control" id="sel2">
                                            <option>6 месяців</option>
                                            <option>18 месяців</option>
                                            <option>24 месяці</option>
                                        </select>
                                    </div>
                                    <p>399 грн/пл</p>
                                </div>
                            </div>
                            <div class="credit-union two">
                                <p>Кредитний союз "Слобожанський"</p>
                                <div>
                                    <div class="credit-union-select">
                                        <div class="select-side">
                                            <i class="credit-union-down gray">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45" height="45" viewBox="0 0 37 27"><g><g transform="translate(-570 -284)"><image width="37" height="27" transform="translate(570 284)" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACUAAAAbCAYAAAD77kbeAAACCElEQVRYR+2V30sUURSAvxlStz9A01LbkKByyzUxA0Ux3IyKwsrMZPsB/j1FkVjpshYmJmIvPUiksFtL6EMUJUEvET3G7po/Vne2mYk7NLGQ5b1sQdAMzNMc5nz3O+eeo9m2bfOPPZoHJVkRz5SkKDxTnilZA7Jx/2dPiYWhaZqsJCdOyZRIYJqmk0TX9U2TWZaNZZlOrHhlH2kosSE/J5NcuzXM4cZ6Oo+04vOVbAjmrtP5l68ZffiIjrZmTh0PbXoIF1oBymZkbJLpp3FWMxn6wz0cC7VRUlz8UzLTtHj1ZoGbd0ZIpRZpbT7EpQtn2FZWKiVLCcqyLO5Gx5h99oL1rMGVi+c40dn+A0wYEjFv373nxmCUZDpNY32dA1RVWfHnTYkjOj31HSyWmGM1s8bl3rMO2Fafj6+myYIAuh0llV6kqSHofK8oL/s7PeV6d21EH0zyZDbO2nrWSRxqb+HDx09cH4iwtLJCMLCPcE8Xu/xV0oaUeyq/GVywoXvjzMQSZI0cXSePEns+x5elZQ4GA/R1n8ZfXalkqCCo/FJG7o8zPRPHMHIUFW2hoS7A1b5udmwvVzZUMJQLJhp7MDJKLDHP7ho//eHz+HdWo+tqAzO/EtK371d3WZTSyOWYmHrM/to9HKjdWxCQ8kT/3ZBxB6bqStnonwWbkpqGikEelKwwz5SsqW8fvjC/keZcfgAAAABJRU5ErkJggg=="/></g></g></svg>
                                            </i>
                                        </div>
                                        <select class="form-control" id="sel3">
                                            <option>6 месяців</option>
                                            <option>18 месяців</option>
                                            <option>24 месяці</option>
                                        </select>
                                    </div>
                                    <p>220 грн/пл</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-delivery-wrap">
                    <h2>{{translate.pay_type}} *</h2>
                    <div class="checked-payment">
                        <div class="checked-payment">
                            <div class="single-payment" v-for="pay in checkedItem.store.pay_types" :class="[{'active': checkedItem.data.payment.payment_type == pay.id}, {'error': errors && errors.payment_type}, pay.slug]" @click="setPayment(pay)">
                                <p><i></i> {{pay.name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="payment-delivery-wrap">
                    <h2>Доставка *</h2>
                    <div class="checked-payment">
                        <div class="single-payment" v-for="delivery in checkedItem.store.delivery_types" :class="[{'active': checkedItem.data.delivery.delivery_type == delivery.id}, {'error': errors && errors.delivery_type}, delivery.slug]" @click="setDelivery(delivery)">
                            <p><i></i> {{delivery.name}}</p>
                        </div>
                    </div>
                    <div class="other-info">
                        <p class="comments">{{translate.comment}}:</p>
                        <textarea name="" id="" cols="30" rows="10" v-model="checkedItem.data.delivery.delivery_comment" :class="{'error': errors.delivery_comment}"></textarea>
                    </div>
                </div>
                <div class="end-section">
                    <div class="two-wrap">
                        <div class="left">
                            <p class="title">{{translate.good_price}}:</p>
                            <p class="price">{{numberWithSpaces(checkedItem.store.price * checkedItem.store.store_count)}} {{checkedItem.store.currency.name}}</p>
                        </div>
                        <div class="right">
                            <button class="btn" @click="setOrder">{{translate.buy_item_btn}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-checkout-success-wrap" v-if="showSuccess">
            <div class="breadcrumbs"></div>
            <div class="success-wrap">
                <div class="head">
                    <div class="left">
                        <p>{{translate.order}} №1</p>
                    </div>
                    <div class="right">
                        <p>{{translate.success_text}}</p>
                        <p>{{translate.buyer_action}}</p>
                    </div>
                </div>
                <div class="main">
                    <div class="product-list">
                        <div class="single-product">
                            <div class="logo-wrap">
                                <img :src="checkedItem.product.default_picture" alt="logo">
                            </div>
                            <div class="product-wrap">
                                <div class="head-product two-wrap">
                                    <div class="left">
                                        <h2>{{productName}}</h2>
                                    </div>
                                    <div class="right">
                                        <p class="price">{{numberWithSpaces(order.price)}} {{checkedItem.product.currency.name}}</p>
                                        <p class="count">{{translate.quantity}} {{order.quantity}} шт.</p>
                                    </div>
                                </div>
                                <p>{{translate.order_delivery_type}}: <span>{{order.delivery.name}}</span></p>
                                <p>{{translate.order_pay_type}}: <span>{{order.payment.name}}</span></p>
                                <p class="space"></p>
                                <p>Магазин {{checkedItem.product.user_shop ? checkedItem.product.user_shop.name : ''}}</p>
                                <p>{{translate.phone}}: <span>{{checkedItem.data.user.phone}}</span></p>
                                <p>{{translate.email}}: <span>{{checkedItem.data.user.email}}</span></p>
                                <div class="right-xs">
                                    <p class="price">{{numberWithSpaces(order.price)}} {{checkedItem.product.currency.name}}</p>
                                    <p class="count">{{translate.quantity}} {{order.quantity}} шт.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="user-cart-full">
                        <p v-if="cartItems.length">{{translate.cart_items_true}} <a href="/checkout" class="btn">{{translate.go_to_cart}}</a></p>
                        <p><a href="/" class="btn">{{translate.go_to_index}}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    import MaskedInput from 'vue-masked-input';
    import SwiperSlide from "../../../../../node_modules/vue-awesome-swiper/src/slide.vue";
    export default {
        data(){
            return {
                swiperOption: {
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    slidesPerView: 3,
                    paginationClickable: true,
                    loop: false,
                    infinity: true
                },
                cartItems: JSON.parse(localStorage.getItem('cart')),
                checkedItem: {'data': {
                    'user': {
                        'first_name': this.user ? this.user.first_name : '',
                        'last_name': this.user ?  this.user.last_name : '',
                        'phone': this.user ?  this.user.phone : '',
                        'email': this.user ?  this.user.email : ''
                    },
                    'delivery': {
                        'delivery_type': '',
                        'delivery_comment': ''
                    },
                    'payment': {
                        'payment_type': ''
                    }
                },
                    'store_count': ''
                },
                showSuccess: false,
                order: null,
                productName: '',
                errors: {
                },
                showApplicationForm: false
            }
        },
        props: ['store', 'user', 'translate'],
        components: {
            SwiperSlide,
            MaskedInput
        },
        created(){
            if(this.cartItems.length){
                Object.assign(this.checkedItem, this.cartItems[0]);
                this.checketStoreId = this.checkedItem.store.id;
            }
        },
        mounted () {

        },
        methods: {
            swiperTest() {
                console.log(this.$refs.mySwiper)
            },
            numberWithSpaces(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
            setItem(item){
                this.checkedItem = {'data': {
                    'user': {
                        'first_name': this.user ? this.user.first_name : '',
                        'last_name': this.user ?  this.user.last_name : '',
                        'phone': this.user ?  this.user.phone : '',
                        'email': this.user ?  this.user.email : ''
                    },
                    'delivery': {
                        'delivery_type': '',
                        'delivery_comment': ''
                    },
                    'payment': {
                        'payment_type': ''
                    }
                }};
                Object.assign(this.checkedItem, item);
                this.checketStoreId = item.store.id;
                this.errors = {};
            },
            getName(name){
                var nameLength = name.split(' ').length;
                if(nameLength > 1){
                    return name.split(' ').splice(0, 2).join(' ')+'...';
                } else {
                    return name;
                }
            },
            setDelivery(delivery){
                this.checkedItem.data.delivery.delivery_type = delivery.id;
                this.errors.hasOwnProperty('delivery_type') ? this.errors.delivery_type = false : '';
            },
            setPayment(payment){
                this.checkedItem.data.payment.payment_type = payment.id;
                this.errors.hasOwnProperty('payment_type') ? this.errors.payment_type = false : '';
            },
            setOrder(){
                for(let u in this.checkedItem.data.user){
                    switch (u) {
                        case ('first_name'):
                            if(this.checkedItem.data.user[u].length < 2){
                                this.$set(this.errors,u, true);
                            } else {
                                this.$set(this.errors,u, false);
                            }
                            break;
                        case ('last_name'):
                            if(this.checkedItem.data.user[u].length < 2){
                                this.$set(this.errors,u, true);
                            } else {
                                this.$set(this.errors,u, false);
                            }
                            break;
                        case ('phone'):
                            var phone = false;
                            if(this.checkedItem.data.user[u].length){
                                phone = this.checkedItem.data.user[u].match(/\d/g).join('');
                            } else {
                                this.$set(this.errors,u, true);
                            }
                            if(!phone || phone.length < 12){
                                this.$set(this.errors,u, true);
                            } else {
                                this.$set(this.errors,u, false);

                            }
                            break;
                        case ('email'):
                            if(!this.validateEmail(this.checkedItem.data.user[u])){
                                this.$set(this.errors,u, true);
                            } else {
                                this.$set(this.errors,u, false);
                            }
                            break;
                    }

//                    if(!this.checkedItem.data.user[u]){
//                        this.$set(this.errors,u, true);
//                    } else {
//                        this.$set(this.errors,u, false);
//                    }
                }
                for(let u in this.checkedItem.data.delivery) {
                    switch (u) {
                        case ('delivery_type'):
                            if(this.checkedItem.data.delivery[u]){
                                this.$set(this.errors,u, false);
                            } else {
                                this.$set(this.errors,u, true);
                            }
                            break;
                        case ('delivery_comment'):
                            if(this.checkedItem.data.delivery[u].length > 255){
                                this.$set(this.errors,u, true);
                            } else {
                                this.$set(this.errors,u, false);
                            }
                            break;
                    }
                }
                for(let u in this.checkedItem.data.payment) {
                    switch (u) {
                        case ('payment_type'):
                            if(this.checkedItem.data.payment[u]){
                                this.$set(this.errors,u, false);
                            } else {
                                this.$set(this.errors,u, true);
                            }
                            break;
                    }
                }
                var hasErr = false;
                for(let err in this.errors){
                    if(this.errors[err]){
                        hasErr = true;
                    }
                }
                if(hasErr) return false;
                let data ={
                    product_id: this.checkedItem.store.id,
                    count: this.checkedItem.store.store_count,
                    user: this.checkedItem.data
                }
                this.$http.post('/set-order', data).then(res => {
                    if(res.data.order){
                        this.showSuccess = true;
                        this.order = res.data.order;
                        this.productName = res.data.product_name;
                        this.cartItems.forEach((item, i) => {
                            if(item.store.id == res.data.order.product_id){
                                this.cartItems.splice(i, 1);
                            }
                        })
                        localStorage.setItem('cart', JSON.stringify(this.cartItems));
                    }
                }, err => {

                })
            },
            validateEmail(email) {
                var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return re.test(email);
            },
            creditClick () {
                this.showApplicationForm = !this.showApplicationForm
            },
        }

    }
</script>