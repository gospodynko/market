<template>
    <section class="search-sect">
        <div class="search-wrap">
            <!--<div class="breadcrumbs"></div>-->
            <div class="info-search-head-wrap">
                <div class="found-list">
                    <h2>Знайдено {{data.products.total}} результатів</h2>
                </div>
                <div class="btn-filter" @click="showFilter">
                    <div>
                        <a class="a-btn-filter" href="#">
                            <div class="svg-filter">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20px" fill="white" viewBox="0 0 971.986 971.986" style="enable-background:new 0 0 971.986 971.986;" xml:space="preserve">
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
                <div class="filters-list">
                    <div class="my-region-wrap">
                        <!--<input type="checkbox" id="my-region-check">-->
                        <!--<label for="my-region-check">-->
                            <!--<span>Сначала предложения в моем регионе</span>-->
                        <!--</label>-->
                    </div>
                    <div class="sort-wrap">
                        <span>Сортувати за:</span>
                        <select @change="setFilter" v-model="filterType">
                            <option :value="'minus'">Спочатку дешеві</option>
                            <option :value="'plus'">Спочатку дорогі</option>
                        </select>
                    </div>
                    <!--<div class="type-view">-->
                        <!--<p><span>Вид:</span> <i class="table"></i><i class="list"></i></p>-->
                    <!--</div>-->
                </div>
            </div>
            <div class="search-content-wrap">
                <div class="chose-filters-head">
                    <h3>Вибрані фільтри: </h3>
                    <div class="all-chose-filters">
                        <div class="single-filter">
                            <p class="name">{{data.q}}</p>
                            <span class="close"></span>
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
                                    <a :href="product.url"><img :src="product.default_picture" alt=""></a>
                                </div>
                                <div class="detail-wrap">
                                    <p class="product-title">
                                        <a :href="product.url">{{product.name}}</a>
                                    </p>
                                    <p class="price">
                                        {{product.price}} {{product.currency.name}}.
                                    </p>
                                </div>
                                <div class="detail-prod-wrap">
                                    <div class="feedback-wrap">
                                        <div class="rating-wrap">
                                            <!--<star-rating :star-size="20"></star-rating>-->
                                        </div>
                                        <div class="count-feedback-wrap">
                                            <a href="#">{{product.reviews.length}} Відгуків</a>
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
                                            <a :href="product.url" class="btn">
                                                Детальніше
                                            </a>
                                        </div>
                                        <div class="two-wrap" v-if="false">
                                            <div class="left">
                                                <i></i>
                                                <span>Отслеживать товар</span>
                                            </div>
                                            <div class="right">
                                                <i></i>
                                                <span>В избранное</span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-search-wrap">
                    <div class="show-all-btn-wrap" v-if="searchProducts && searchProducts.total > 12 && searchProducts.last_page !== searchProducts.current_page">
                        <vue-ladda class="btn show-more" @click="getNew" :loading="loadProduct">Показати ще</vue-ladda>
                        <!--<button class="btn" @click="getNew">Показать еще</button>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    import StarRating from 'vue-star-rating';

    export default{
        data(){
            return {
                filterType: 'minus',
                searchProducts: this.data.products,
                loadProduct: false
            }
        },
        props: ['data'],
        components: {
            StarRating
        },
        methods: {
            setFilter(){
                if(!this.filterType) return false;
                let data = {
                    sort: this.filterType,
                    q: this.data.q
                }
                this.$http.post('/search', data).then(res => {
                    this.searchProducts = res.data.products;
                }, err => {

                })
            },
            getNew () {
                this.loadProduct = true;
                let data = {
                    sort: this.filterType,
                    q: this.data.q,
                    page: this.searchProducts.current_page + 1
                }
                this.$http.post('/search', data).then(res => {
                    this.searchProducts.current_page = res.data.products.current_page
                    res.data.products.data.forEach(product => {
                        this.searchProducts.data.push(product);
                    })
                    this.loadProduct = false
                }, err => {

                })
            }
        }
    }
</script>