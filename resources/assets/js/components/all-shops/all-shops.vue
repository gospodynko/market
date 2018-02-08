<template>
    <section class="shop-sect">
        <div class="shop-wrap">
            <div class="breadcrumbs">
                <!--<div v-html="breadcrumbs"></div>-->
            </div>
            <!---->
            <aside>
                <div class="dropdown-shop">
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
            <!---->
            <div class="filter-products">
                <h4 id="sum-h">Всього магазинів: {{shopList.data.length}} </h4>
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
                            <div  v-if="!shopList.data.length">
                                <h3>"На жаль в даному розділі немає товарів, спробуйте знайти щось інше"</h3>
                            </div>
                            <div class="single-product" style="width: 23.5%; " v-for="shop in shopList.data">
                                <div class="img-wrap">
                                    <a :href="'/' + shop.url"><img :src="'' + shop.logo" alt=""></a>
                                </div>
                                <div class="detail-wrap">
                                    <p class="product-title">
                                        <a :href="'/' + shop.url">{{shop.name}}</a>
                                    </p>
                                </div>
                                <div class="detail-prod-wrap">
                                    <div class="feedback-wrap">
                                        <div class="rating-wrap">
                                            <star-rating :star-size="20" :increment="0.01" :rating=shop.rate :read-only="true" :show-rating="true"></star-rating>
                                        </div>
                                        <div class="count-feedback-wrap">
                                            <a :href="shop.url"> 0 Відгуків</a>
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
                    <div class="paginate-wrap" v-if="shopList.total > 16">
                        <paginate :page-count="shopList.last_page"
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

                ]
            }
        },
        props: ['data', 'translate', 'breadcrumbs','shopList'],
        components: {
            StarRating,
            paginate
        },
        methods: {
            clickCallback(newPage){
                if(this.page < newPage){
                    location.href = this.shopList.next_page_url;
                } else {
                    location.href = this.shopList.prev_page_url;
                }


            }
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
</script>