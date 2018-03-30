<template>
    <div class="main-content">
        <aside>
            <div class="dropdown">
                <div class="category" v-for="category in categories">
                    <div class="root-path">
                        <img src="/img/gsm.png" alt="kanistra">
                        <span>{{category.name}}</span>
                    </div>
                    <div class="sub-cuts-wrap">
                         <ul>
                            <li v-for="child in category.children" v-if="child.products_count">
                                <input type="checkbox" name="subcat-name" :id="'subcat-child-' + child.id" @change="setSort" :value="child.id" v-model="categoryIds">
                                <label :for="'subcat-child-' + child.id">{{child.name + ' ' + '(' + child.products_count + ')'}}</label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- Start filter -->
        <div class="hidden-shop-filter" :class="{'open': showShop}">
            <div class="category" v-for="category in categories">
                <div class="sub-cuts-wrap">
                    <ul>
                        <li v-for="child in category.children" v-if="child.products_count">
                            <input type="checkbox" name="subcat-name" :id="'subcat-child-' + child.id" @change="setSort" :value="child.id" v-model="categoryIds">
                            <label :for="'subcat-child-' + child.id">{{child.name + ' ' + '(' + child.products_count + ')'}}</label>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="close-menu-xs" @click="shopClick">
                <img src="/img/shop-logo/arrow-menu.png" alt="arrow-menu">
            </div>
        </div>
        <div class="overlay-burger" :class="{'open': showShop}" @click="shopClick"></div>
        <!-- End filter -->
        <div class="content">
            <div class="partners-egap-company">
                <div class="info-partners">
                    <p class="desktop-banner-egap">Завдяки Швейцарсько-українській програмі EGAP «Електронне врядування задля підзвітності влади та участі громади», що виконується Фондом Східна Європа та партнерами, «АгроЯрд Маркет» працює та самовдосконалюється для Вас.</p>
                    <p class="mobile-banner-egap">При підтримці Швейцарсько-української програми
                        <a class="link_egap" href="http://egap.in.ua/"> EGAP </a>
                        проект «АгроЯрд Маркет» працює для Вас
                    </p>
                    <a class="logo_egap" href="http://egap.in.ua/">
                        <img src="/img/footer/egap.png" title="Натисність для переходу на сайт EGAP!" alt="Логотип сайту EGAP" />
                    </a>
                </div>
            </div>
            <div class="agro-info">
                <div class="agro-logo">
                    <img :src="shop.logo" :alt="shop.name">
                </div>
                <div class="bg"></div>
                <div class="info">
                    <div>
                        <h3>{{shop.name}}</h3>
                        <div class="agro-contact">
                            <span><img src="/img/blue_place.png" alt="location">{{shop.company.address}}</span>
                            <span @click="showPhone = !showPhone" style="cursor: pointer;"><img src="/img/phone.png" alt="phone">{{!showPhone ? 'Номер телефону' : shop.company.compPhone}}</span>
                        </div>
                    </div>
                    <div class="rating">
                        <h3>РЕЙТИНГ МАГАЗИНУ</h3>
                        <div class="rating-wrap">
                            <star-rating :star-size="20" :increment="0.01" :rating=shop.rate :read-only="true" :show-rating="true"></star-rating>
                        </div>
                    </div>
                </div>
            </div>
            <div class="btn-filter"  @click="shopClick">
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
                <div class="sort-view">
                    <div class="filters">
                        <h4>Сортувати:</h4>
                        <select @change="sortFilter" v-model="sortType">
                            <option selected="selected" value="null">За замовчуванням</option>
                            <option :value="sort.id" v-for="sort in sortTypes">{{sort.name}}</option>
                        </select>
                    </div>
                    <div class="view">
                        <h4>Вид:</h4>
                        <span><a href="#" class="grid" :class="{'active': !showList}" @click.prevent="showList = false"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24" height="24" viewBox="0 0 24 24"><defs><path id="a" d="M3538 483v-5h5v5zm0 8v-5h5v5zm0 8v-5h5v5zm8-16v-5h5v5zm0 8v-5h5v5zm0 8v-5h5v5zm8-16v-5h5v5zm0 8v-5h5v5zm0 8v-5h5v5z"/></defs><g transform="translate(-3536 -476)"><use fill="#1dd659" xlink:href="#a"/></g></svg></a></span>
                        <span><a href="#" class="table" :class="{'active': showList}" @click.prevent="showList = true">
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

                <h4 id="sum-h">Всього товарів у магазині: {{allProducts.total}}
                    <!--<span>{{category.name}}</span>-->
                </h4>

                <div class="category-480" v-for="category in categories">
                    <div class="root-path">
                        <span>{{category.name}}</span>
                    </div>
                </div>

            </div>
            <div id="grass-defend" class="products">
                <div class="all-products-list shop-products-wrap" :class="{'type-list': showList}">
                    <div class="single-product" v-for="product in shopProducts">
                        <div class="img-wrap">
                            <a :href="'/' + product.url"><img :src="product.default_picture" :alt="product.name"></a>
                        </div>
                        <div class="for-list">
                            <div class="detail-wrap">
                                <p class="product-title">
                                    <a :href="'/' + product.url">{{product.name}}</a>
                                </p>
                                <p class="price">
                                    {{numberWithSpaces(product.price)}} грн
                                    <!--{{product.currency.name}}.-->
                                </p>
                            </div>
                            <div class="detail-prod-wrap">
                                <div class="all-detail-list">
                                    <ul>
                                        <li>{{product.description.length > 100 ? product.description.slice(0, 100) + ' ...' : product.description }}</li>
                                    </ul>
                                </div>
                                <div class="hide-list-wrap">
                                    <div class="all-goods-btn">
                                        <a :href="'/' + product.url" class="btn">
                                            Детальніше
                                        </a>
                                    </div>
                                    <div class="two-wrap" style="display: none;">
                                        <div class="left">
                                            <i></i>
                                            <!--<span>{{translate.spy_good}}</span>-->
                                        </div>
                                        <div class="right">
                                            <i></i>
                                            <!--<span>{{translate.faworite}}</span>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback-wrap">
                                    <div class="rating-wrap">
                                        <star-rating :star-size="15" :increment="0.01" :rating=product.rate :read-only="true" :show-rating="true"></star-rating>
                                    </div>
                                    <div class="count-feedback-wrap">
                                        <a href="#">{{product.reviews.length}} відгуків</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="show-all-btn-wrap" v-if="allProducts && allProducts.total > 6 && !hideShowMore">
                        <vue-ladda class="btn show-more" @click="getNew" :loading="loadProduct">Показати ще</vue-ladda>
                    </div>
                </div>
            </div>
    </div>
    </div>
</template>
<script type="text/babel">
    import VueLadda from 'vue-ladda'
    import StarRating from 'vue-star-rating';
    export default {
        data () {
            return {
                loadProduct: false,
                page: this.products.current_page,
                shopProducts: this.products.data,
                allProducts: this.products,
                hideShowMore: false,
                sortType: null,
                showList: false,
                categoryIds: [],
                showPhone: false,
                showShop: false,
                sortTypes: [
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

                ]
            }
        },
        components: {
            VueLadda,
            StarRating
        },
        props: ['shop', 'categories', 'products'],
        watch: {
            '$route.name': function (val) {
                this.closeMenu()
            },
            //Отключает задний скрол
            showShop: function (val) {
                if (val) {
                    this.hiddenBody('open')
                } else {
                    this.hiddenBody('close')
                }
            }
        },
        methods: {
            closeMenu () {
                this.showShop = false
            },
            shopClick () {
                this.showShop = !this.showShop
            },
            hiddenBody (key) {
                if (key === 'open') {
                    $('body').css('overflow', 'hidden')
                } else {
                    $('body').css('overflow', '')
                }
            },
            getNew () {
                this.loadProduct = true
                ++this.page
                let data = {
                    page: this.page
                }
                if (this.sortType) {
                    this.sortTypes.forEach(type => {
                        if (+type.id === +this.sortType) {
                            data.order_by = type.slug
                            data.order_by_type = type.type
                        }
                    })
                }
                if (this.categoryIds.length) {
                    data.category_id = this.categoryIds
                }
                this.$http.post('/shop/' + this.shop.slug + '/load', data).then(res => {
                    if (res.data.last_page === this.page) {
                        this.hideShowMore = true
                    }
                    let arrConcat = this.shopProducts.concat(res.data.data)
                    this.shopProducts = arrConcat
                    this.loadProduct = false
                }, err => {
                    this.loadProduct = false
                })
            },
            sortFilter () {
                let data = {}
                this.sortTypes.forEach(type => {
                    if (+type.id === +this.sortType) {
                        data.order_by = type.slug
                        data.order_by_type = type.type
                    }
                })
                if (this.categoryIds.length) {
                    data.category_id = this.categoryIds
                }
                this.$http.post('/shop/' + this.shop.slug + '/load', data).then(res => {
                    this.shopProducts = res.data.data
                    this.allProducts = res.data
                    this.page = res.data.current_page
                    if (res.data.last_page !== this.page) {
                        this.hideShowMore = false
                    }
                }, err => {
                })
            },
            numberWithSpaces (x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
            setSort () {
                console.log(this.categoryIds)
                this.$http.post('/shop/' + this.shop.slug + '/load', {category_id: this.categoryIds}).then(res => {
                    this.shopProducts = res.data.data
                    this.allProducts = res.data
                    this.page = res.data.current_page
                    if (res.data.last_page !== this.page) {
                        this.hideShowMore = false
                    }
                }, err => {
                })
            }
        }
    }
</script>