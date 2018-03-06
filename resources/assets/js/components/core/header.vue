<template>
    <header @mouseleave="closeMenu()">
        <div class="overlay" :class="{'show': showChild || showOverlay}" @click="showPopupFunc"></div>
        <div class="overlay" style="z-index: 6" :class="{'show': showOverlayPopup}" @click="showPopupFunc"></div>
        <cart-blocked :translate="cartTranslate"></cart-blocked>
        <!--<noselect-user :user="user" v-if="user && user.role == 'noselect'"></noselect-user>-->
        <!--<div class="shops-popup-wrap" v-if="showPopup">-->
            <!--<span class="close" @click="showPopupFunc"></span>-->
            <!--<h2>{{translate.popup_catalog}}</h2>-->
            <!--<p>Скоро вiдкриття!</p>-->
        <!--</div>-->
        <div class="header">
            <div class="two-wrap">
                <div class="left">
                    <div class="burger-xs" @click="menuClickxs">
                        <svg class="svg-burger-menu-480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="30px" height="30px" viewBox="0 0 396.667 396.667" style="enable-background:new 0 0 396.667 396.667;" xml:space="preserve">
<g>
	<g>
		<path d="M17,87.833h362.667c9.35,0,17-7.65,17-17s-7.65-17-17-17H17c-9.35,0-17,7.65-17,17C0,80.183,7.65,87.833,17,87.833z"/>
		<path d="M17,215.333h362.667c9.35,0,17-7.65,17-17s-7.65-17-17-17H17c-9.35,0-17,7.65-17,17S7.65,215.333,17,215.333z"/>
		<path d="M17,342.833h362.667c9.35,0,17-7.65,17-17s-7.65-17-17-17H17c-9.35,0-17,7.65-17,17S7.65,342.833,17,342.833z"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                    </div>
                        <div class="logo">
                        <a href="/">
                           <img class="img-logo-480" src="/img/header/logo_480.svg" alt="">
                           <img class="img-logo-1024" src="/img/header/logo.svg" alt="">
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
                            <a href="#" class="basket" @click="showCartFunc(0, 1)">
                                <i></i>
                                <span class="badge" :class="{'badge': cart}" v-if="cart && cart.length">{{cart.length}}</span>
                                <p>
                                    {{translate.cart}}
                                </p>
                            </a>
                        </div>
                        <div class="item">
                            <div class="user-wrap" v-if="user">
                                <img src="/img/avatars/ava.png" alt="" class="avatar">
                                <span class="logout" @click="logout">{{translate.exit}}</span>
                            </div>
                            <a href="/login" v-else>
                                <svg class="svg-login-480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 258.8 258.8" style="enable-background:new 0 0 258.8 258.8;" xml:space="preserve">
<circle cx="129.4" cy="109" r="60"/>
<path d="M129.4,181c-60.1,0-108.8,34.8-108.8,77.8h217.5C238.1,215.8,189.4,181,129.4,181z"/>
</svg>
                                <p>
                                    {{translate.enter}}
                                </p>
                            </a>
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
        <!---->
        <div class="hidden-filter" :class="{'open': showMenuxs}">
            <ul>
                <li>
                    <div class="item">
                        <div class="user-wrap" v-if="user">
                            <img src="/img/avatars/ava.png" alt="" class="avatar">
                        </div>
                        <a href="/login" v-else>
                            <svg class="svg-login-480" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 258.8 258.8" style="enable-background:new 0 0 258.8 258.8;" xml:space="preserve">
<circle cx="129.4" cy="109" r="60"/>
<path d="M129.4,181c-60.1,0-108.8,34.8-108.8,77.8h217.5C238.1,215.8,189.4,181,129.4,181z"/>
</svg>
                            <p>
                                {{translate.enter}}
                            </p>
                        </a>
                    </div>

                    <div class="item">
                        <a href="/shop/products" class="shop" v-if="user && user.role == 'seller'">
                            <!--<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" width="20px" height="20px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 11497 9839">-->
 <!--<g id="Слой_x0020_1">-->
  <!--<metadata id="CorelCorpID_0Corel-Layer"/>-->
  <!--<path fill="#fff" d="M0 2294l0 317 26 44c57,120 77,270 262,413 129,100 295,205 530,202 580,-10 721,-493 860,-604 75,106 207,626 819,603 413,-16 678,-309 766,-658 52,34 47,28 75,115 97,308 417,539 754,543 339,5 670,-222 772,-524 10,-27 9,-35 21,-63l45 -71c82,144 64,268 286,460 456,393 1115,158 1290,-322l61 -138 0 0c65,67 46,126 117,250 326,568 1285,592 1510,-250 67,37 17,-6 51,51 19,31 19,87 80,194 271,476 982,600 1367,57 63,-89 79,-180 127,-247 115,92 175,288 338,415 136,106 328,197 564,188 300,-11 561,-209 683,-447 45,-88 60,-202 93,-277l0 -202c-60,-124 -52,-213 -145,-353l-1487 -1990 -3298 0 -4170 0 -761 2c-277,315 -942,1287 -1267,1687 -182,225 -235,289 -330,529l-39 76z"/>-->
  <!--<path fill="#fff" d="M1325 9832l8842 7 5 -5957c-154,-49 -4155,-14 -4424,-14 -261,0 -4282,-34 -4423,15l0 5949z"/>-->
  <!--<path fill="#fff" d="M1325 9837l8842 2 5 -1364c-154,-11 -4155,-3 -4424,-3 -261,0 -4282,-7 -4423,4l0 1361z"/>-->
 <!--</g>-->
<!--</svg>-->
                            <i></i> {{translate.my_shop}}
                        </a>
                    </div>
                    <div class="item ibasket">
                        <a href="#" class="basket" @click="showCartFunc(0, 1)">
                            <i></i>
                            <span class="badge" :class="{'badge': cart}" v-if="cart && cart.length">{{cart.length}}</span>
                            <p>
                                {{translate.cart}}
                            </p>
                        </a>
                    </div>
                </li>
                <li v-for="(category,k) in categories">
                    <div class="category-item">
                    <a :href="'/category/'+category.slug" >
                        <div class="single-menu-item-xs" :class="{'active': checkedCat && checkedCat.id == category.id}">
                            <p>{{category.name}} <i></i></p>
                        </div>
                    </a>
                    <div class="open-btn" :class="{'open': showSubGroup}" @click="showSub(k, category)">
                        <img src="/img/header/arrow-down.png" alt="">
                    </div>
                    </div>
                    <ul class="mini-cat" :class="{'open': showSubGroup === k + 1}">
                        <li class="mini-cat-li" v-for="subCategory in subCategories" >
                            <a :href="'/category/'+checkedCat.slug+'/'+subCategory.slug">
                                <p>{{subCategory.name}}</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="item linkexit">
                        <div class="user-wrap" v-if="user">
                            <span class="logout" @click="logout">
                                <svg class="svg-user-exit" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px"  width="20px" height="20px" fill="lightgray"  viewBox="0 0 459 459" xml:space="preserve">
<g>
	<g id="exit-to-app">
		<path d="M181.05,321.3l35.7,35.7l127.5-127.5L216.75,102l-35.7,35.7l66.3,66.3H0v51h247.35L181.05,321.3z M408,0H51    C22.95,0,0,22.95,0,51v102h51V51h357v357H51V306H0v102c0,28.05,22.95,51,51,51h357c28.05,0,51-22.95,51-51V51    C459,22.95,436.05,0,408,0z" fill="#b3b3b3"/>
	</g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                                {{translate.exit}}
                            </span>
                        </div>
                    </div>
                </li>
            </ul>
            <div class="close-menu-xs" @click="menuClickxs">
                <img src="/img/header/arrow_white.png" alt="">
            </div>
        </div>
        <div class="overlay-burger" :class="{'open': showMenuxs}" @click="menuClickxs"></div>
        <!---->
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
                                    <button type="submit" class="btn">
                                        <svg class="svg-search-btn" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve">
<path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z"/>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
<g>
</g>
</svg>
                                        <p>
                                            {{translate.search}}
                                        </p>
                                    </button>
                                </label>
                            </form>
                        </div>
                        <div class="all-shops-btn">
                            <button class="btn" @click="allShopsPage">{{translate.all_shops}}</button>
                            <!--<a href="/all-shops"><button class="btn"> {{translate.all_shops}}</button></a>-->
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
                checkedCat: null,
                showMenuxs: false,
                showSubGroup: false
            }
        },
        watch: {
            showMenuxs: function (val) {
                if (val) {
                    this.hiddenBody('open')
                } else {
                    this.hiddenBody('close')
                }
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
                this.hiddenBody('close')
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
            showSub (k, category) {
                k = k + 1
                this.subCategories = category.children
                this.checkedCat = category
                if (+k === +this.showSubGroup) {
                    this.showSubGroup = false
                    return false
                }
                this.showSubGroup = k
                console.log(k)
            },
            menuClickxs () {
                this.showMenuxs = !this.showMenuxs
            },
            setChild(category){
                this.showChild = true;
                this.subCategories = category.children;
                this.checkedCat = category;
                this.showUl = !this.showUl
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
            hiddenBody (key) {
                if (key === 'open') {
                    $('body').css('overflow', 'hidden')
                } else {
                    $('body').css('overflow', '')
                }
            },
            showCartFunc(e = 0){
//                if (val) {
//                    this.hiddenBody('open')
//                }
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
            // showPopupFunc(){
            //     this.showPopup = !this.showPopup;
            //     this.showOverlayPopup = !this.showOverlayPopup;
            //     // this.showPopup = !this.showPopup;
            //     // this.hiddenBody('close')
            //     // Events.$emit('closePopup', this.showPopup);
            // },
           allShopsPage(){

                       location.href = '/all-shops/';
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