<template>
    <section class="search-sect">
        <div class="search-wrap">
            <div class="breadcrumbs"></div>
            <div class="info-search-head-wrap">
                <div class="found-list">
                    <h2>{{translate.search_found}} {{data.products.total}} {{translate.search_result}}</h2>
                </div>
                <div class="filters-list">
                    <div class="my-region-wrap">
                        <!--<input type="checkbox" id="my-region-check">-->
                        <!--<label for="my-region-check">-->
                            <!--<span>Сначала предложения в моем регионе</span>-->
                        <!--</label>-->
                    </div>
                    <div class="sort-wrap">
                        <span>{{translate.sort_by}}:</span>
                        <select @change="setFilter" v-model="filterType">
                            <option :value="'min'">{{translate.sort_by_asc}}</option>
                            <option :value="'max'">{{translate.sort_by_desc}}</option>
                            <option :value="'rating'">По рейтингу</option>
                        </select>
                    </div>
                    <!--<div class="type-view">-->
                        <!--<p><span>Вид:</span> <i class="table"></i><i class="list"></i></p>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="search-content-wrap">
                <div class="chose-filters-head">
                    <h3>{{translate.chose_filters}}: </h3>
                    <div class="all-chose-filters">
                        <div class="single-filter">
                            <p class="name">{{data.q}}</p>
                            <!--<span class="close"></span>-->
                        </div>
                    </div>
                </div>
                <div class="main-search-content">
                    <div class="filter-wrap" v-if="false">
                        <div class="price-wrap" v-if="true">
                            <h3><i></i>Цена</h3>
                            <div class="price-sect">
                                <span>От</span>
                                <input type="text">
                                <span class="to">До</span>
                                <input type="text">
                            </div>
                        </div>
                        <div class="status-product" v-if="true">
                            <h3><i></i>Статусы продукта</h3>
                            <ul>
                                <li>
                                    <input type="checkbox" id="name-status-1">
                                    <label for="name-status-1">Какой-то статус</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-status-2">
                                    <label for="name-status-2">Какой-то статус</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-status-3">
                                    <label for="name-status-3">Какой-то статус</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-status-4">
                                    <label for="name-status-4">Какой-то статус</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-status-5">
                                    <label for="name-status-5">Какой-то статус</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-status-6">
                                    <label for="name-status-6">Какой-то статус</label>
                                </li>
                            </ul>
                        </div>
                        <div class="shop-rating-list" v-if="true">
                            <h3><i></i>Рейтинг магазина</h3>
                            <ul>
                                <li>
                                    <input type="radio" id="name-rating-1" name="shop-rating">
                                    <label for="name-rating-1"><i class="star"></i><i class="star"></i><i
                                            class="star"></i><i class="star"></i><i class="star"></i></label>
                                </li>
                                <li>
                                    <input type="radio" id="name-rating-2" name="shop-rating">
                                    <label for="name-rating-2"><i class="star"></i><i class="star"></i><i
                                            class="star"></i><i class="star"></i></label>
                                </li>
                                <li>
                                    <input type="radio" id="name-rating-3" name="shop-rating">
                                    <label for="name-rating-3"><i class="star"></i><i class="star"></i><i
                                            class="star"></i></label>
                                </li>
                                <li>
                                    <input type="radio" id="name-rating-4" name="shop-rating">
                                    <label for="name-rating-4"><i class="star"></i><i class="star"></i></label>
                                </li>
                                <li>
                                    <input type="radio" id="name-rating-5" name="shop-rating">
                                    <label for="name-rating-5"><i class="star"></i></label>
                                </li>
                            </ul>
                        </div>
                        <div class="status-product" v-if="true">
                            <h3><i></i>Поставщики</h3>
                            <ul>
                                <li>
                                    <input type="checkbox" id="name-seller-1">
                                    <label for="name-seller-1">Какой-то поставщик</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-seller-2">
                                    <label for="name-seller-2">Какой-то поставщик</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-seller-3">
                                    <label for="name-seller-3">Какой-то поставщик</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-seller-4">
                                    <label for="name-seller-4">Какой-то поставщик</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-seller-5">
                                    <label for="name-seller-5">Какой-то поставщик</label>
                                </li>
                                <li>
                                    <input type="checkbox" id="name-seller-6">
                                    <label for="name-seller-6">Какой-то поставщик</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="content-wrap" style="width: 100%;">
                        <div class="all-products-list" style="width: 100%;">
                            <div class="single-product" style="width: 23.5%; " v-for="product in searchProducts.data">
                                <div class="img-wrap">
                                    <a :href="'/products/'+product.slug"><img :src="product.default_picture" alt=""></a>
                                </div>
                                <div class="detail-wrap">
                                    <p class="product-title">
                                        <a :href="'/products/'+product.slug">{{product.name}}</a>
                                    </p>
                                    <p class="price">
                                        {{product.price_min !== product.price_max ? product.price_min + ' - ' + product.price_max : product.price_max}} грн.
                                    </p>
                                </div>
                                <div class="detail-prod-wrap">
                                    <div class="feedback-wrap">
                                        <div class="rating-wrap">
                                            <star-rating :star-size="20"></star-rating>
                                        </div>
                                        <div class="count-feedback-wrap">
                                            <a :href="'/products/'+product.slug">{{product.reviews.length}} {{translate.reviews}}</a>
                                        </div>
                                    </div>
                                    <div class="all-detail-list">
                                        <ul>
                                            <li>{{product.description.length > 100 ? product.description.slice(0, 100) + ' ...' : product.description }}</li>
                                        </ul>
                                    </div>
                                    <div class="hide-list-wrap">
                                        <!--<div class="all-detail-list">-->
                                            <!--<ul>-->
                                                <!--<li>{{product.description}}</li>-->
                                            <!--</ul>-->
                                        <!--</div>-->
                                        <div class="all-goods-btn">
                                            <a :href="'/products/'+product.slug" class="btn">
                                                {{translate.all_items}}
                                            </a>
                                        </div>
                                        <div class="two-wrap">
                                            <div class="left">
                                                <i></i>
                                                <span>{{translate.spy_good}}</span>
                                            </div>
                                            <div class="right">
                                                <i></i>
                                                <span>{{translate.faworite}}</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-search-wrap">
                    <div class="paginate-wrap" v-if="data.products.total > 16">
                        <!--<ul class="paginate">-->
                            <!--<li class="prev"><i></i> Назад</li>-->
                            <!--<li>1</li>-->
                            <!--<li class="active">2</li>-->
                            <!--<li>3</li>-->
                            <!--<li class="next">Вперед <i></i></li>-->
                        <!--</ul>-->
                        <paginate :page-count="data.products.last_page"
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
                    <div class="chose-page" v-if="false">
                        <span>Перейти к странице</span>
                        <label for="chose-page-id">
                            <input type="text" id="chose-page-id">
                            <span class="btn">OK</span>
                        </label>
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
                filterType: this.data.sort,
                searchProducts: this.data.products,
                page: this.data.products.current_page - 1
            }
        },
        props: ['data', 'translate'],
        components: {
            StarRating,
            paginate
        },
        methods: {
            setFilter(){
                location.href = location.pathname+'?q='+this.data.q+'&sort='+this.filterType
//                if(!this.filterType) return false;
//                let data = {
//                    sort: this.filterType
//                }
//                this.$http.post('/search', data).then(res => {
//                    this.searchProducts = res.data.products;
//                }, err => {
//
//                })
            },
            clickCallback(newPage){
                if(this.page < newPage){
                    location.href = this.data.products.next_page_url+'&q='+this.data.q+'&sort='+this.filterType;
                } else {
                    location.href = this.data.products.prev_page_url+'&q='+this.data.q+'&sort='+this.filterType;
                }


            }
        }
    }
</script>