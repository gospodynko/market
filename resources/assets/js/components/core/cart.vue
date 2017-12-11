<template>
    <div class="cart-blocked-wrap" :class="{'show': showCart}">
        <div class="cart-wrap">
            <span class="close" @click="closeCart()"></span>
            <div class="cart-list-wrap">
                <div class="cart-head-wrap two-wrap">
                    <div class="left">
                        <h2>{{translate.cart_goods}}</h2>
                    </div>
                    <div class="right">
                        <div class="count-purchases" v-if="cartItems">
                            <p>{{translate.together}}: <span>{{cartItems.length}}</span> {{translate.goods}}</p>
                        </div>
                    </div>
                </div>
                <div class="cart-detail-list">
                    <div v-if="!cartItems || !cartItems.length">
                        <h3 class="empty-basket">В корзині немає товарів. Але ви можете це виправити :)</h3>
                        <!--<div class="right" style="width: 70%;">-->
                            <!--<a href="/checkout" class="btn" style="pointer-events: none;">{{translate.buy_item}}</a>-->
                        <!--</div>-->
                    </div>
                      <div class="single-item-cart" v-for="cartItem in cartItems" v-if="cartItems && cartItems.length">
                        <div class="logo-wrap">
                            <img :src="cartItem.store.default_picture" alt="">
                        </div>
                        <div class="title-wrap">
                            <h2><a :href="'/' + cartItem.product.url">{{cartItem.store.name}}</a></h2>
                            <div class="content">
                                <p>Магазин {{cartItem.store.user_shop.name}}</p>
                                <star-rating :star-size="20" :increment="0.01" :rating=cartItem.product.rate :read-only="true" :show-rating="false"></star-rating>
                            </div>
                        </div>
                        <div class="price-wrap">
                            <p class="price-title">{{numberWithSpaces(+cartItem.store.price * cartItem.store.store_count)}} грн</p>
                            <div class="count-items-wrap">
                                <span @click="changeCount('minus', cartItem)">-</span><input type="text" :value="cartItem.store.store_count"><span class="to" @click="changeCount('plus', cartItem)">+</span>
                            </div>
                            <span class="close" @click="delFromCart(cartItem)"></span>
                        </div>

                        <!--<div class="checkout-wrap">-->
                        <!--<a :href="'/checkout/'+cartItem.store.id" class="btn">Оформить заказ</a>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="cart-footer-action two-wrap">
                    <div class="left" style="width: 30%"></div>
                    <div class="right" style="width: 70%;">
                        <div v-if="!cartItems || !cartItems.length">
                            <a href="/checkout" class="btn basket-btn" style="pointer-events: none;">{{translate.buy_item}}</a>
                        </div>
                        <div v-else>
                            <a href="/checkout" class="btn basket-btn">{{translate.buy_item}}</a>
                        </div>
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
        props:['translate'],
        components:{
            starRating
        },
        methods: {
            numberWithSpaces(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
            delFromCart(item){
                this.cartItems.forEach((cartItem,i) => {
                    if(cartItem.store.id === item.store.id){
                        this.cartItems.splice(i,1);
                    }
                });
                localStorage.setItem('cart', JSON.stringify(this.cartItems));
                Events.$emit('updateCart', true);
                if(!this.cartItems.length){
                    this.closeCart();
                }
            },
            settingsCart(status){
                this.cartItems = JSON.parse(localStorage.getItem('cart'));
                this.showCart = status;
            },
            closeCart(){
                this.showCart = !this.showCart;
                Events.$emit('closeCart', this.showCart);
            },
            changeCount(type, item){
                if(type == 'minus'){
                    var countItem = item.store.store_count;
                    countItem = countItem--;
                    if(countItem <= 1){
                        console.log(countItem);
                        item.store.store_count = 1;
                    } else {
                        item.store.store_count = countItem--;
                    }
                    this.cartItems.forEach(cart => {
                        if(cart.store.id === item.store.id){
                            cart.store.store_count = countItem;
                        }
                    });
                } else {
                    ++item.store.store_count;
                }
                localStorage.setItem('cart', JSON.stringify(this.cartItems));
            }
        }
    }
</script>