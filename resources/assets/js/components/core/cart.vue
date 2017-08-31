<template>
    <div class="cart-blocked-wrap" :class="{'show': showCart}">
        <div class="cart-wrap">
            <span class="close" @click="closeCart()"></span>
            <div class="cart-list-wrap">
                <div class="cart-head-wrap two-wrap">
                    <div class="left">
                        <h2>Корзина заказов</h2>
                    </div>
                    <div class="right">
                        <div class="count-purchases" v-if="cartItems">
                            <p>Итого: <span>{{cartItems.length}}</span> товарa</p>
                        </div>
                    </div>
                </div>
                <div class="cart-detail-list">
                    <div class="single-item-cart" v-for="cartItem in cartItems">
                        <div class="logo-wrap">
                            <img :src="cartItem.product.images[0]" alt="">
                        </div>
                        <div class="title-wrap">
                            <h2><a href="#">{{cartItem.product.name}}</a></h2>
                            <div class="content">
                                <p>Магазин техники "Электричка"</p>
                                <star-rating :star-size="20"></star-rating>
                            </div>
                        </div>
                        <div class="price-wrap">
                            <p class="price-title">{{+cartItem.store.price * cartItem.store.store_count}} грн</p>
                            <div class="count-items-wrap">
                                <span>-</span><input type="text" :value="cartItem.store.store_count"><span class="to">+</span>
                            </div>
                            <span class="close" @click="delFromCart(cartItem)"></span>
                        </div>
                    </div>
                </div>
                <div class="cart-footer-action two-wrap">
                    <div class="left"></div>
                    <div class="right">
                        <button class="btn">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import starRating from 'vue-star-rating';
    import {Events} from './../../app';
    export default{
        data(){
            return{
                showCart: false,
                cartItems: JSON.parse(localStorage.getItem('cart'))
            }
        },
        created(){
            Events.$on('showCart', (status) => {
                this.settingsCart(status);
            })
        },
        components:{
            starRating
        },
        methods: {
            delFromCart(item){
                this.cartItems.forEach((cartItem,i) => {
                    if(cartItem.store.id === item.store.id){
                        this.cartItems.splice(i,1);
                    }
                })
                localStorage.setItem('cart', JSON.stringify(this.cartItems))
            },
            settingsCart(status){
                this.cartItems = JSON.parse(localStorage.getItem('cart'));
                this.showCart = status;
            },
            closeCart(){
                this.showCart = !this.showCart;
                Events.$emit('closeCart', this.showCart);
            }
        }
    }
</script>