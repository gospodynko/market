<template>
    <section class="shop-sect">
        <div class="shop-wrap">
            <!--<div class="breadcrumbs">-->
                <!--&lt;!&ndash;<div v-html="breadcrumbs"></div>&ndash;&gt;-->
            <!--</div>-->
            <!---->
            <aside>
                <div class="dropdown-shop">
                    <div class="main-category">
                        <h2>Категорії</h2>
                        <span class="open-icon" :class="{'close': showMenu}" @click="menuClick"></span>
                    </div>
                    <div class="category" :class="{'open': showMenu}">
                        <ul>
                            <li v-for="category in categories">
                                <input type="checkbox" name="xs-subcat-name" :id="'xs-subcat-child-' + category.id" :value="category.id" v-model="categoryIds">
                                <label :for="'xs-subcat-child-' + category.id">{{category.name}}</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>
            <!-- Start filter -->
            <div class="hidden-shops-filter" :class="{'open': showShops}">
                <div class="dropdown-shop">
                    <div class="main-category">
                        <h2>Категорії</h2>
                        <span class="open-icon" :class="{'close': showMenu}" @click="menuClick"></span>
                    </div>
                    <div class="category" :class="{'open': showMenu}">
                        <ul>
                            <li v-for="category in categories">
                                <input type="checkbox" name="xm-subcat-name" :id="'xm-subcat-child-' + category.id" :value="category.id" v-model="categoryIds" @click="shopsClick">
                                <label :for="'xm-subcat-child-' + category.id">{{category.name}}</label>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="close-menu-xs" @click="shopsClick">
                    <img src="/img/shop-logo/arrow-menu.png" alt="arrow-menu">
                </div>
            </div>
            <div class="overlay-burger" :class="{'open': showShops}" @click="shopsClick"></div>
            <!-- End filter -->
            <div class="shop-page-content">
                <div class="btn-filter"  @click="shopsClick">
                    <div class="btn-filter-div">
                        <a href="#" class="btn-filter-flex">
                            <div class="svg-filter">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20px" viewBox="0 0 971.986 971.986" style="fill:white;" xml:space="preserve">
<g>
<path d="M370.216,459.3c10.2,11.1,15.8,25.6,15.8,40.6v442c0,26.601,32.1,40.101,51.1,21.4l123.3-141.3   c16.5-19.8,25.6-29.601,25.6-49.2V500c0-15,5.7-29.5,15.8-40.601L955.615,75.5c26.5-28.8,6.101-75.5-33.1-75.5h-873   c-39.2,0-59.7,46.6-33.1,75.5L370.216,459.3z"/>
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
                            <p class="filter">Фiльтр</p>
                        </a>
                    </div>
                </div>
                <div class="filter-products">
                    <h4 id="sum-h">Всього магазинів: {{shopData.data.length}} </h4>
                    <div class="sort-view">
                        <div class="filters">
                            <h4>тип сортування:</h4>
                            <select @change="sortFilter" v-model="sortType">
                                <option selected="selected" value="null">За замовчуванням</option>
                                <option :value="sort.id" v-for="sort in sortTypesShop">{{sort.name}}</option>
                            </select>
                        </div>
                        <div class="view">
                            <h4>Вид:</h4>
                            <span><a href="#" class="grid" :class="{'active': !showListShop}" @click.prevent="showListShop = false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24"><defs><path id="a" d="M3538 483v-5h5v5zm0 8v-5h5v5zm0 8v-5h5v5zm8-16v-5h5v5zm0 8v-5h5v5zm0 8v-5h5v5zm8-16v-5h5v5zm0 8v-5h5v5zm0 8v-5h5v5z"/></defs><g transform="translate(-3536 -476)"><use fill="#1dd659" xlink:href="#a"/></g></svg></a></span>
                            <span><a href="#" class="table" :class="{'active': showListShop}" @click.prevent="showListShop = true">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 18 18" version="1.1">
                                    <title>Group2</title>
                                    <desc>Created using Figma</desc>
                                    <g id="Canvas" transform="translate(6590 1075)">
                                    <g id="Group2">
                                    <g id="Vector">
                                    <use xlink:href="#path0_fill" transform="translate(-6590 -1075)"/>
                                    </g>
                                    <g id="Vector">
                                    <use xlink:href="#path0_fill" transform="translate(-6590 -1068)"/>
                                    </g>
                                    <g id="Vector">
                                    <use xlink:href="#path0_fill" transform="translate(-6590 -1061)"/>
                                    </g>
                                    <g id="Vector">
                                    <use xlink:href="#path1_fill" transform="translate(-6583 -1075)"/>
                                    </g>
                                    <g id="Vector">
                                    <use xlink:href="#path1_fill" transform="translate(-6583 -1068)"/>
                                    </g>
                                    <g id="Vector">
                                    <use xlink:href="#path1_fill" transform="translate(-6583 -1061)"/>
                                    </g>
                                    </g>
                                    </g>
                                    <defs>
                                    <path id="path0_fill" d="M 4 0L 0 0L 0 4L 4 4L 4 0Z"/>
                                    <path id="path1_fill" d="M 11 0L 0 0L 0 4L 11 4L 11 0Z"/>
                                    </defs>
                                </svg>
                            </a></span>
                        </div>
                    </div>
                </div>
                <!---->
                <div class="info-shop-head-wrap" >
                    <div class="found-list">
                        <h2 style="color: #0f0f0f">Магазини</h2>
                    </div>
                </div>
                <div class="shop-content-wrap">
                    <div class="main-shop-content" >
                        <div class="content-wrap" style="width: 100%;">
                            <div class="all-products-list" style="width: 100%;" :class="{'shops-list': showListShop}">
                                <div  v-if="!shopData.data.length">
                                    <h3>"На жаль в даному розділі немає товарів, спробуйте знайти щось інше"</h3>
                                </div>
                                <div class="single-product" style="width: 23.5%; " v-for="shop in shopData.data">
                                    <div class="img-wrap">
                                        <a :href="'/' + shop.url"><img :src="'' + shop.logo" :alt="shop.name"></a>
                                    </div>
                                    <div class="detail-wrap">
                                        <p class="product-title">
                                            <a :href="'/' + shop.url">{{shop.name}}</a>
                                        </p>
                                    </div>
                                    <div class="detail-prod-wrap">
                                        <div class="feedback-wrap">
                                            <div class="rating-wrap">
                                                <star-rating :star-size="20" :increment="0.01" :rating=shop.rate :read-only="true" :show-rating="false"></star-rating>
                                            </div>
                                            <div class="count-feedback-wrap">
                                                <a :href="shop.url">0 Відгуків</a>
                                                <!--{{shop.reviews.length}}-->
                                            </div>
                                        </div>
                                        <!--<div class="all-detail-list">-->
                                        <!--<ul>-->
                                        <!--<li>{{shop.description.length > 100 ? shop.description.slice(0, 100) + ' ...' : product.description }}</li>-->
                                        <!--</ul>-->
                                        <!--</div>-->
                                        <div class="hide-list-wrap">
                                            <div class="all-goods-btn">
                                                <a :href="'/' + shop.url" class="btn">
                                                    До магазину
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-search-wrap">
                        <div class="paginate-wrap" v-if="shopData.total > 16">
                            <paginate :page-count="shopData.last_page"
                                      :page-range="3"
                                      :margin-pages="2"
                                      :initial-page="page"
                                      :click-handler="clickCallback"
                                      :container-class="'paginate'"
                                      :prev-text="'Назад'"
                                      :next-text="'Вперед'"
                                      :prev-class="'prev'"
                                      :next-class="'next'"
                                      ref="paginate"
                                      :page-class="'page-item'"></paginate>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    import StarRating from 'vue-star-rating';
    import paginate from 'vuejs-paginate';

    export default{
        data(){
            return {
//                categoryProducts: this.data.shop,
                page: this.shopList.current_page - 1,
                showListShop: false,
                showMenu: false,
                showShops: false,
                sortTypesShop: [
                    {
                        id: 1,
                        type: 'desc',
                        slug: 'price',
                        name: 'Ціна: Від більшої до меншої'
                    },
                    {
                        id: 2,
                        type: 'asc',
                        slug: 'price',
                        name: 'Ціна: Від меншої до більшої'
                    },
                    {
                        id: 3,
                        type: 'desc',
                        slug: 'created_at',
                        name: 'Спочатку нові'
                    },

                ],
                categoryIds: [],
                shopData: this.shopList,
                sortType: null
            }
        },
        props: ['breadcrumbs','shopList', 'categories'],
        components: {
            StarRating,
            paginate
        },
        watch: {
            categoryIds: function (val) {
                this.setSort()
            },
            showShops: function (val) {
                if (val) {
                    this.hiddenBody('open')
                } else {
                    this.hiddenBody('close')
                }
            }
        },
        methods: {
            closeMenu () {
                this.showShops = false
            },
            shopsClick () {
                this.showShops = !this.showShops
            },
            sortFilter () {
            },
            hiddenBody (key) {
                if (key === 'open') {
                    $('body').css('overflow', 'hidden')
                } else {
                    $('body').css('overflow', '')
                }
            },
            clickCallback(newPage){
                if(this.page < newPage){
                    location.href = this.shopList.next_page_url;
                } else {
                    location.href = this.shopList.prev_page_url;
                }
            },
            menuClick () {
                this.showMenu = !this.showMenu
            },
            setSort () {
                this.$http.post('/all-shops', {category_ids: this.categoryIds}).then(res => {
                    console.log(res);
                    this.shopData = res.data.shop_list
//                this.shopProducts = res.data.data
//                this.allProducts = res.data
//                this.page = res.data.current_page
//                if (res.data.last_page !== this.page) {
//                    this.hideShowMore = false
//                }
                }, err => {
                })
            }
        }
    }
</script>