<template>
    <section class="top-product">
        <div class="top-product-wrap">
            <h2>Топ предложений</h2>
            <div class="all-products-list">
                <div class="single-product" v-for="product in allProducts.data">
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
                                <a href="#">{{product.reviews.length}} отзывов</a>
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
                                <a :href="'/products/'+product.slug" class="btn">
                                    Все предложения
                                </a>
                            </div>
                            <div class="two-wrap">
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
                <div class="show-all-btn-wrap" v-if="products && allProducts.total > 12">
                    <vue-ladda class="btn"@click="getNew" :loading="loadProduct">Показать еще</vue-ladda>
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
          'products'
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
                       this.allProducts.data.unshift(item);
                   })

                   this.page = res.data.products.current_page;
                   this.loadProduct = false;
               }, err => {
                   this.loadProduct = false;
               })
           }
        }
    }
</script>