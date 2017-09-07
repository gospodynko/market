<template>
    <section class="cart-checkout-sect">
        <div class="cart-checkout-wrap" v-if="!showSuccess">
            <div class="breadcrumbs"></div>

            <div class="all-items-cart-wrap">
                <div class="checkout-user-wrap">
                    <h2>Товары в корзине</h2>
                    <div class="product-list">
                        <div class="single-product" v-for="item in cartItems" @click="setItem(item)" :class="{'active': item.store.id == checketStoreId}">
                            <div class="logo">
                                <img :src="item.product.default_picture" alt="">
                            </div>
                            <div class="title">
                                <p>{{getName(item.product.name)}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="checked-product">
                        <div class="image-prod">
                            <img :src="checkedItem.product.default_picture" alt="">
                        </div>
                        <div class="detail-description">
                            <div class="head">
                                <p class="title">{{checkedItem.product.name}}</p>
                                <p class="shop-title">Магазин {{checkedItem.store.shop.name}}</p>
                            </div>
                            <div class="footer">
                                <p class="price">{{checkedItem.store.price * checkedItem.store.store_count}} грн</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="detail-user-fields">
                    <h2>Данные покупателя</h2>
                    <div class="field-list">
                        <p>
                            <span>Имя</span>
                            <input type="text" v-model="checkedItem.data.user.first_name">
                        </p>
                        <p>
                            <span>Фамилия</span>
                            <input type="text" v-model="checkedItem.data.user.last_name">
                        </p>
                    </div>
                    <div class="field-list">
                        <p>
                            <span>Телефон</span>
                            <input type="phone" v-model="checkedItem.data.user.phone">
                        </p>
                        <p>
                            <span>Email</span>
                            <input type="email" v-model="checkedItem.data.user.email">
                        </p>
                    </div>
                </div>
                <div class="payment-delivery-wrap">
                    <h2>Доставка</h2>
                    <div class="checked-payment">
                        <div class="single-payment" v-for="delivery in checkedItem.store.delivery_types" :class="[{'active': checkedItem.data.delivery.delivery_type == delivery.id}, delivery.slug]" @click="setDelivery(delivery)">
                            <p><i></i> {{delivery.name}}</p>
                        </div>
                    </div>
                    <div class="other-info">
                        <p class="comments">Комментарий:</p>
                        <textarea name="" id="" cols="30" rows="10" v-model="checkedItem.data.delivery.delivery_comment"></textarea>
                    </div>
                </div>
                <div class="payment-delivery-wrap">
                    <h2>Оплата</h2>
                    <div class="checked-payment">
                        <div class="checked-payment">
                            <div class="single-payment" v-for="pay in checkedItem.store.pay_types" :class="[{'active': checkedItem.data.payment.payment_type == pay.id}, pay.slug]" @click="setPayment(pay)">
                                <p><i></i> {{pay.name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="end-section">
                    <div class="two-wrap">
                        <div class="left">
                            <p class="title">Итого:</p>
                            <p class="price">{{checkedItem.store.price * checkedItem.store.store_count}} грн</p>
                        </div>
                        <div class="right">
                            <button class="btn" @click="setOrder">Заказать</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="cart-checkout-success-wrap" v-if="showSuccess">
            <div class="breadcrumbs">

            </div>

            <div class="success-wrap">
                <div class="head">
                    <div class="left">
                        <p>Заказ №1</p>
                    </div>
                    <div class="right">
                        <p>
                            Поздравляем, ваш заказ принят!
                        </p>
                        <p>Продавец уведомлен о заказе и вскоре свяжется.</p>
                    </div>
                </div>
                <div class="main">
                    <div class="product-list">
                        <div class="single-product">
                            <div class="logo-wrap">
                                <img src="" alt="">
                            </div>
                            <div class="product-wrap">
                                <div class="head-product">
                                    <div class="left">
                                        <h2>{{productName}}</h2>
                                    </div>
                                    <div class="right">
                                        <p class="price">{{order.price}} грн</p>
                                        <p class="count">количество {{order.quantity}} шт.</p>
                                    </div>
                                </div>
                                <p>Способ доставки: <span>{{order.delivery.name}}</span></p>
                                <p>Способ оплаты: <span>{{order.payment.name}}</span></p>
                                <p class="space"></p>
                                <p>{{order.user_product.shop.name}}</p>
                                <p>Телефон: <span>{{order.buyer.phone}}</span></p>
                                <p>E-mail: <span>{{order.buyer.email}}</span></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer">
                    <div class="user-cart-full">
                        <p v-if="cartItems.length">У вас есть заказы в корзине <a href="#" class="btn">Перейти к корзине</a></p>
                        <p><a href="#" class="btn">Продолжить покупки</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    export default {
        data(){
            return {
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
                    }},
                showSuccess: false,
                order: null,
                productName: ''
            }
        },
        props: ['store', 'user'],
        created(){
            if(this.cartItems.length){
                Object.assign(this.checkedItem, this.cartItems[0]);
                this.checketStoreId = this.checkedItem.store.id;
            }
        },
        methods: {
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
            },
            setPayment(payment){
                this.checkedItem.data.payment.payment_type = payment.id;
            },
            setOrder(){
                this.$http.post('/set-order', this.checkedItem).then(res => {
                    if(res.data.order){
                        this.showSuccess = true;
                        this.order = res.data.order;
                        this.productName = res.data.product_name;
                        this.cartItems.forEach((item, i) => {
                            if(item.product.id == res.data.order.user_product_id){
                                this.cartItems.splice(i, 1);
                            }
                        })
                        localStorage.setItem('cart', JSON.stringify(this.cartItems));
                    }
                }, err => {

                })
            }
        }

    }
</script>