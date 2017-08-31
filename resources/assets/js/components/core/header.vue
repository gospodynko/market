<template>
    <header @mouseleave="closeMenu()">
        <div class="overlay" :class="{'show': showChild || showOverlay}"></div>
        <cart-blocked></cart-blocked>
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
                            <p class="city"><i></i> Город</p>
                        </div>
                        <div class="item">
                            <a href="#" class="shop"><i></i> Мой магазин</a>
                        </div>
                        <div class="item">
                            <a href="#" class="basket" @click="showCartFunc"><i></i><span class="badge" :class="{'badge': cart}" v-if="cart && cart.length">{{cart.length}}</span> Корзина</a>
                        </div>
                        <div class="item">
                            <div class="user-wrap" v-if="user">
                                <img src="/img/avatars/ava.jpg" alt="" class="avatar">
                                <span class="logout" @click="logout">Выйти</span>
                            </div>

                            <a href="/login" v-else>Войти</a>
                        </div>
                        <div class="item">
                            <ul class="languages">
                                <li class="language">UA</li>
                                <li class="language">RU</li>
                                <li class="language">EN</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="catalogue-wrap" @mouseleave="closeMenu()">
            <div class="menu-wrap">
                <div class="catalog-menu-items">
                    <div class="catalog-menu-btn" @click="showMenuFunc()">
                        <i class="burger"></i>
                        <p>Каталог товаров</p>
                        <i class="arrow-down"></i>
                    </div>
                </div>
                <div class="all-menu-list active" v-if="showMenu">
                    <div class="site-menu-wrap">
                        <div class="single-menu-item" v-for="category in categories" @mouseover="setChild(category.children)">
                            <p>{{category.name}} <i></i></p>
                        </div>
                    </div>
                    <div class="site-menu-wrap child-menu" v-if="showChild" @mouseleave="showChild = false">
                        <div class="single-menu-item" v-for="subCategory in subCategories">
                            <p>{{subCategory.name}} <i></i></p>
                        </div>
                    </div>
                </div>
                <div class="search-wrap">
                    <div class="actions-wrap">
                        <div class="search-action-wrap">
                            <form method="get" action="/search">
                                <label for="search-input">
                                    <input type="text" id="search-input" name="q">
                                    <button type="submit" class="btn">Поиск</button>
                                </label>
                            </form>
                        </div>
                        <div class="all-shops-btn">
                            <button class="btn">Все магазины</button>
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
    export default {
        data(){
            return {
                showMenu: false,
                showChild: false,
                subCategories: null,
                categories: null,
                showOverlay: false,
                cart: JSON.parse(localStorage.getItem('cart')),
                showCart: false
            }
        },
        props: ['user'],
        components: {
            cartBlocked
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
        },
        methods: {
            setChild(children){
                this.showChild = true;
                this.subCategories = children;
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
                this.showMenu = !this.showMenu;
            },
            closeMenu()
            {
                this.showOverlay = false;
                if(location.pathname == '/') return;
                this.showChild = false;
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
            }

        }
    }
</script>