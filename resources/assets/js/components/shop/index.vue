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
                                <input type="checkbox" name="subcat-name" :id="'subcat-child-' + child.id">
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
                    </div>
                </div>
            </div>
            <div class="filter-products">
                <h4>Всего товаров в магазине: {{products.total}}</h4>
                <div class="sort-view">
                    <div class="filters">
                        <h4>сортировать по:</h4>
                        <select @change="sortData" v-model="sortType">
                            <option selected="selected" value="null">По умолчанию</option>
                            <option :value="sort.id" v-for="sort in sortTypes">{{sort.name}}</option>
                        </select>
                    </div>
                    <div class="view">
                        <h4>Вид:</h4>
                        <span><a href="" data-view="first"></a></span>
                        <span><a href="" data-view="second"></a></span>
                    </div>
                </div>
            </div>

            <div id="grass-defend" class="products">
                <div class="product-items">
                    <div class="product-item" v-for="product in shopProducts">
                        <div class="product-cover">
                            <img :src="product.default_picture" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>{{product.name}}</h4>
                            <h4>{{product.price}} грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">{{product.description}}</p>
                                <p class="review-counter">{{product.reviews.length}} отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li v-for="(feature, i) in JSON.parse(product.features)[0].params" v-if="i < 3">{{feature.title +' '+ feature.param}}</li>
                                    <!--<li>Масса эксплуатационная, кг 5260</li>-->
                                    <!--<li>База, мм 2450</li>-->
                                </ul>

                                <button >ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <!-- list view  -->
                    <!-- list view -->
                    <vue-ladda class="show-more"@click="getNew" :loading="loadProduct" v-if="!hideShowMore">ПОКАЗАТЬ ЕЩЕ</vue-ladda>
                </div>
                <!-- new products list -->
            </div>
    </div>
    </div>
</template>

<script type="text/babel">
    export default {
        data () {
            return {
                loadProduct: false,
                page: this.products.current_page,
                shopProducts: this.products.data,
                hideShowMore: false,
                sortType: null,
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
        props: ['shop', 'categories', 'products'],
        methods: {
            getNew () {
                this.loadProduct = true
                ++this.page
                this.$http.post('/shop/' + this.shop.slug + '/load', {page: this.page}).then(res => {
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

            }
        }
    }
</script>