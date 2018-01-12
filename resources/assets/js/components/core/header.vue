<template>
    <header @mouseleave="closeMenu()">
        <div class="overlay" :class="{'show': showChild || showOverlay}" @click="showPopupFunc"></div>
        <div class="overlay" style="z-index: 6" :class="{'show': showOverlayPopup}" @click="showPopupFunc"></div>
        <cart-blocked :translate="cartTranslate"></cart-blocked>
        <!--<noselect-user :user="user" v-if="user && user.role == 'noselect'"></noselect-user>-->
        <div class="shops-popup-wrap" v-if="showPopup">
            <span class="close" @click="showPopupFunc"></span>
            <h2>{{translate.popup_catalog}}</h2>
            <p>Coming soon!</p>
        </div>
        <div class="header">
            <div class="two-wrap">

                <div class="left">
                    <div class="logo">
                        <a href="/">
                            <img src="/img/header/logo.svg" alt="">
                        </a>
                    </div>
                </div>
                <div class="right">
                    <div class="site-menu">
                        <div class="item">
                            <!--<p class="city"><i></i> Город</p>-->
                        </div>
                        <div class="item">
                            <a href="/shop/products" class="shop" v-if="user && user.role == 'seller'"><i></i> {{translate.my_shop}}</a>
                        </div>
                        <div class="item">
                            <a href="#" class="basket" @click="showCartFunc"><i></i><span class="badge" :class="{'badge': cart}" v-if="cart && cart.length">{{cart.length}}</span> {{translate.cart}}</a>
                        </div>
                        <div class="item">
                            <div class="user-wrap" v-if="user">
                                <img src="/img/avatars/ava.png" alt="" class="avatar">
                                <span class="logout" @click="logout">{{translate.exit}}</span>
                            </div>

                            <a href="/login" v-else>{{translate.enter}}</a>
                        </div>
                        <!--<div class="item">-->
                        <!--&lt;!&ndash;<ul class="languages">&ndash;&gt;-->
                        <!--&lt;!&ndash;<li class="language">UA</li>&ndash;&gt;-->
                        <!--&lt;!&ndash;<li class="language">RU</li>&ndash;&gt;-->
                        <!--&lt;!&ndash;<li class="language">EN</li>&ndash;&gt;-->
                        <!--&lt;!&ndash;</ul>&ndash;&gt;-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="catalogue-wrap" @mouseleave="closeMenu()">
            <div class="menu-wrap">
                <div class="catalog-menu-items">
                    <div class="catalog-menu-btn" @click="showMenuFunc()">
                        <i class="burger"></i>
                        <p>{{translate.catalog}}</p>
                        <i class="arrow-down"></i>
                    </div>
                </div>
                <!--:class="{'full-size': showChild}" v-if="showMenu"-->
                <div class="all-menu-list active" :class="{'full-size': showChild}" v-if="showMenu">
                    <!--:class="{'show': showChild}"-->
                    <div class="menu-listing" :class="{'show': showChild}">
                        <div class="site-menu-wrap">
                            <a :href="'/category/'+category.slug" v-for="category in categories" >
                                <div class="single-menu-item" :class="{'active': checkedCat && checkedCat.id == category.id}" @mouseover="setChild(category)">
                                    <p>{{category.name}} <i></i></p>
                                </div>

                            </a>
                        </div>
                        <!--showChild-->
                        <!--v-if="showChild" @mouseleave="showChild = false"-->
                        <div class="site-menu-wrap child-menu" v-if="showChild" @mouseleave="showChild = false">
                            <div v-if="!subCategories">Оберіть категорію товарів</div>
                            <a v-if="checkedCat" :href="'/category/'+checkedCat.slug+'/'+subCategory.slug" v-for="subCategory in subCategories">
                                <div class="single-menu-item" :style="{'backgroundImage': 'url(/img/menu-imgs/'+subCategory.slug+'.png)'}">
                                    <!--<img :src="'/img/menu-imgs/'+subCategory.slug+'.png'" alt="">-->
                                    <p>{{subCategory.name}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="search-wrap">
                    <div class="actions-wrap">
                        <div class="search-action-wrap">
                            <form method="get" action="/search" ref="custom" v-on:submit.prevent="onSubmit">
                                <label for="search-input">
                                    <input type="text" id="search-input" name="q" v-model="q">
                                    <button type="submit" class="btn">{{translate.search}}</button>
                                </label>
                            </form>
                        </div>
                        <div class="all-shops-btn">
                            <button class="btn" @click="showPopupFunc">{{translate.all_shops}}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    import cartBlocked from './cart.vue';
    import {Events} from './../../app';
    import NoselectUser from './noselect-user.vue';
    export default {
        data(){
            return {
                showMenu: false,
                showChild: false,
                subCategories: null,
                categories: null,
                showOverlay: false,
                cart: JSON.parse(localStorage.getItem('cart')),
                showCart: false,
                showPopup: false,
                showOverlayPopup: false,
                q: '',
                checkedCat: null
            }
        },
        props: ['user', 'translate', 'cartTranslate'],
        components: {
            cartBlocked,
            NoselectUser
        },
        created(){
            this.getCategories();
            if(location.pathname == '/'){
                this.showMenu = true;
            }
            Events.$on('closeCart', (status) => {
                this.showCart = status;
            })
            Events.$on('newCartItem', () => {
                this.showCartFunc();
            })
            Events.$on('updateCart', () => {
                this.updateCart();
            })
            Events.$on('updateRole', (user) => {
                this.user = user;
            })
        },
        methods: {
            setChild(category){
                this.showChild = true;
                this.subCategories = category.children;
                this.checkedCat = category;
            },
            logout(){
                this.$http.post('/logout', {}).then(res => {
                    this.user = null;
                }, err => {

                })
            },
            getCategories(){
                this.$http.post('/get-categories', {}).then(res => {
                    this.categories = res.data;
                }, err => {

                })
            },
            showMenuFunc()
            {
                if(location.pathname == '/') return;
                this.showOverlay = true;
                this.showChild = true;
                this.showMenu = !this.showMenu;
            },
            closeMenu()
            {
                this.checkedCat = null;
                this.showOverlay = false;
                this.showChild = false;
                if(location.pathname == '/') return;
                this.showMenu = false;
            },
            showCartFunc(e = 0){
                if(e){
                    e.preventDefault();
                } else {
                    this.cart = JSON.parse(localStorage.getItem('cart'));
                }
                this.showCart = !this.showCart;
                Events.$emit('showCart', this.showCart);
            },
            updateCart(){
                this.cart = JSON.parse(localStorage.getItem('cart'));
            },
            showPopupFunc(){
                this.showPopup = !this.showPopup;
                this.showOverlayPopup = !this.showOverlayPopup;
            },
            onSubmit(){
                if(this.q.length <= 1){
                    return false;
                } else {
                    this.$refs.custom.submit();
                }
            }

        }
    }
</script>