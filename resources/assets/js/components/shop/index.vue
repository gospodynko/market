<template>
    <div class="main-content">
        <aside>
            <div class="dropdown">
                <div class="category" v-for="category in categories">
                    <div class="root-path">
                        <img src="/img/gsm.png" alt="">
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
        <div class="content">
            <div class="agro-info">
                <div class="agro-logo">
                    <img :src="shop.logo" alt="">
                </div>
                <div class="bg"></div>
                <div class="info">
                    <div>
                        <h3>{{shop.name}}</h3>
                        <div class="agro-contact">
                            <span><img src="/img/blue_place.png">Днепр</span>
                            <span><img src="/img/phone.png">Номер телефона</span>
                        </div>
                    </div>
                    <div class="rating">
                        <h3>РЕЙТИНГ МАГАЗИНА</h3>
                        <div class="rating-wrap">
                            <star-rating :star-size="20" :increment="0.01" :rating=shop.rate :read-only="true" :show-rating="true"></star-rating>
                        </div>
                    </div>
                </div>
            </div>
            <div class="filter-products">
                <h4>Всего товаров в магазине: {{allProducts.total}}</h4>
                <div class="sort-view">
                    <div class="filters">
                        <h4>сортировать по:</h4>
                        <select @change="sortFilter" v-model="sortType">
                            <option selected="selected" value="null">По умолчанию</option>
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
            </div>

            <div id="grass-defend" class="products">
                <div class="all-products-list shop-products-wrap" :class="{'type-list': showList}">
                    <div class="single-product" v-for="product in shopProducts">
                        <div class="img-wrap">
                            <a :href="'/' + product.url"><img :src="product.default_picture" alt=""></a>
                        </div>
                        <div class="for-list">
                            <div class="detail-wrap">
                                <p class="product-title">
                                    <a :href="'/' + product.url">{{product.name}}</a>
                                </p>
                                <p class="price">
                                    {{numberWithSpaces(product.price)}} грн.
                        </p>
                            </div>
                            <div class="detail-prod-wrap">
                                <div class="feedback-wrap">
                                    <div class="rating-wrap">
                                        <star-rating :star-size="20" :increment="0.01" :rating=product.rate :read-only="true" :show-rating="true"></star-rating>
                                    </div>
                                    <div class="count-feedback-wrap">
                                        <a href="#">{{product.reviews.length}} отзывов</a>
                                    </div>
                                </div>
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

                            </div>
                        </div>
                    </div>
                    <div class="show-all-btn-wrap" v-if="allProducts && allProducts.total > 6 && !hideShowMore">
                        <vue-ladda class="btn show-more" @click="getNew" :loading="loadProduct">ПОКАЗАТЬ ЕЩЕ</vue-ladda>
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
                sortTypes: [
                    {
                        id: 1,
                        type: 'desc',
                        slug: 'price',
                        name: 'Цена: От большей к меньшей'
                    },
                    {
                        id: 2,
                        type: 'asc',
                        slug: 'price',
                        name: 'Цена: От меньшей к большей'
                    },
                    {
                        id: 3,
                        type: 'desc',
                        slug: 'created_at',
                        name: 'Сначала новые'
                    },

                ]
            }
        },
        components: {
            VueLadda,
            StarRating
        },
        props: ['shop', 'categories', 'products'],
        methods: {
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