<template>
    <section class="top-product">
        <div class="top-product-wrap">
            <div class="best-price-480">
                <p>Посевной материал в Украине</p>
                <p>Лучшие цены</p>
                <p class="price-best-price-480">от 5 000 до 7 000 грн</p>
            </div>
            <h2>{{translate.top_items}}</h2>
            <div class="all-products-list">
                <div class="single-product" v-for="product in allProducts.data">
                    <div class="img-wrap">
                        <a :href="product.url"><img :src="product.default_picture" alt="product"></a>
                    </div>
                    <div class="detail-wrap">
                        <p class="product-title">
                            <a :href="product.url">{{product.name}}</a>
                        </p>
                        <p class="price">
                            {{numberWithSpaces(product.price)}} грн <!-- {{product.currency.name}} -->
                        </p>
                    </div>
                    <div class="hide-list-wrap-480">
                        <div class="all-goods-btn">
                            <a :href="product.url" class="btn">
                                Детальніше
                            </a>
                        </div>
                        <div class="two-wrap" v-if="false">
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
                    <div class="detail-prod-wrap">
                        <div class="feedback-wrap-480">
                            <div class="rating-wrap">
                                <star-rating :star-size="15" :increment="0.01" :rating=product.rate :read-only="true" :show-rating="true"></star-rating>
                            </div>
                            <div class="count-feedback-wrap">
                                <a href="#">{{product.reviews.length}} {{translate.reviews}}</a>
                            </div>
                        </div>
                        <div class="feedback-wrap">
                            <div class="rating-wrap">
                                <star-rating :star-size="20" :increment="0.01" :rating=product.rate :read-only="true" :show-rating="true"></star-rating>
                            </div>
                            <div class="count-feedback-wrap">
                                <a href="#">{{product.reviews.length}} {{translate.reviews}}</a>
                            </div>
                        </div>
                        <div class="all-detail-list">
                            <ul>
                                <li>{{product.description.length > 100 ? product.description.slice(0, 100) + ' ...' : product.description }}</li>
                            </ul>
                        </div>
                        <div class="hide-list-wrap">
                            <!--<div class="all-detail-list">-->
                                <!--&lt;!&ndash;<ul>&ndash;&gt;-->
                                    <!--&lt;!&ndash;&lt;!&ndash;<li>Масса конструкционная, кг	5100</li>&ndash;&gt;&ndash;&gt;-->
                                    <!--&lt;!&ndash;&lt;!&ndash;<li>Масса эксплуатационная, кг	5260</li>&ndash;&gt;&ndash;&gt;-->
                                    <!--&lt;!&ndash;&lt;!&ndash;<li>База , мм	2450</li>&ndash;&gt;&ndash;&gt;-->
                                    <!--&lt;!&ndash;<li>{{product.description}}</li>&ndash;&gt;-->
                                <!--&lt;!&ndash;</ul>&ndash;&gt;-->
                            <!--</div>-->
                            <div class="all-goods-btn">
                                <a :href="product.url" class="btn">
                                    Детальніше
                                </a>
                            </div>
                            <div class="two-wrap" v-if="false">
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
                <div class="show-all-btn-wrap" v-if="products && allProducts.total > 12">
                    <vue-ladda class="btn show-more"@click="getNew" :loading="loadProduct">{{translate.show_more}}</vue-ladda>
                    <!--<button class="btn" @click="getNew">Показать еще</button>-->
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    import StarRating from 'vue-star-rating';
    import VueLadda from 'vue-ladda'
    export default{
        data(){
            return{
                page: 1,
                allProducts: this.products,
                loadProduct: false
            }
        },
        props: [
          'products',
            'translate'
        ],
        components: {
            StarRating,
            VueLadda
        },
        methods: {
           getNew(){
               this.loadProduct = true;
               this.$http.post('/', {'page': ++this.page}).then(res => {
                   res.data.products.data.forEach(item => {
                       this.allProducts.data.push(item);
                   })

                   this.page = res.data.products.current_page;
                   this.loadProduct = false;
               }, err => {
                   this.loadProduct = false;
               })
           },
            numberWithSpaces(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
        }
    }
</script>