<template>
    <header>
        <div class="header">
            <div class="two-wrap">

                <div class="left">
                    <div class="logo">
                        <img src="/img/header/logo.svg" alt="">
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
                            <a href="#" class="basket"><i></i> Корзина</a>
                        </div>
                        <div class="item">
                            <img src="/img/avatars/ava.jpg" alt="" class="avatar">
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
        <div class="catalogue-wrap">
            <div class="menu-wrap">
                <div class="catalog-menu-items">
                    <div class="catalog-menu-btn">
                        <i class="burger"></i>
                        <p>Каталог товаров</p>
                        <i class="arrow-down"></i>
                    </div>
                </div>
                <div class="all-menu-list active" v-if="showMenu">
                    <div class="site-menu-wrap">
                        <div class="single-menu-item">
                            <p>Авто, Мото <i></i></p>
                        </div>
                        <div class="single-menu-item">
                            <p>Авто, Мото <i></i></p>
                        </div>
                        <div class="single-menu-item">
                            <p>Авто, Мото <i></i></p>
                        </div>
                        <div class="single-menu-item">
                            <p>Авто, Мото <i></i></p>
                        </div>
                        <div class="single-menu-item">
                            <p>Авто, Мото <i></i></p>
                        </div>
                        <div class="single-menu-item">
                            <p>Авто, Мото <i></i></p>
                        </div>
                        <div class="single-menu-item">
                            <p>Авто, Мото <i></i></p>
                        </div>

                    </div>
                </div>
                <div class="search-wrap">
                    <div class="actions-wrap">
                        <div class="search-action-wrap">
                            <label for="search-input">
                                <input type="text" id="search-input">
                                <button class="btn">Поиск</button>
                            </label>
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
    export default {
        data(){
            return {
                showMenu: false
            }
        },
        created(){
            if(location.pathname == '/'){
                this.showMenu = true;
            }
        }
    }
</script>