<template>
    <section class="search-sect">
        <div class="search-wrap">
            <div class="breadcrumbs">
                <div v-html="breadcrumbs"></div>
            </div>
            <div class="info-search-head-wrap">
                <div class="found-list">
                    <h2>{{translate.category}} {{data.cat_name}}</h2>
                </div>
            </div>
            <div class="search-content-wrap">
                <div class="chose-filters-head">
                    <!--<h3>{{translate.chose_filters}}: </h3>-->
                    <!--<div class="all-chose-filters">-->
                        <!--<div class="single-filter">-->
                            <!--<p class="name">{{data.q}}</p>-->
                            <!--&lt;!&ndash;<span class="close"></span>&ndash;&gt;-->
                        <!--</div>-->
                    <!--</div>-->
                </div>
                <div class="main-search-content">
                    <div class="content-wrap" style="width: 100%;">
                        <div class="all-products-list" style="width: 100%;">
                            <div  v-if="!categoryProducts.data.length">
                                <h3>"На жаль в даному розділі немає товарів, спробуйте знайти щось інше"</h3>
                            </div>
                            <div class="single-product" style="width: 23.5%; " v-for="product in categoryProducts.data">
                                <div class="img-wrap">
                                    <a :href="'/' + product.url"><img :src="product.default_picture" alt=""></a>
                                </div>
                                <div class="detail-wrap">
                                    <p class="product-title">
                                        <a :href="'/' + product.url">{{product.name}}</a>
                                    </p>
                                    <p class="price">
                                        {{product.price}} {{product.currency.name}}
                                    </p>
                                </div>
                                <div class="detail-prod-wrap">
                                    <div class="feedback-wrap">
                                        <div class="rating-wrap">
                                            <star-rating :star-size="20" :increment="0.01" :rating=product.rate :read-only="true" :show-rating="true"></star-rating>
                                        </div>
                                        <div class="count-feedback-wrap">
                                            <a :href="product.url">{{product.reviews.length}} Відгуків</a>
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
                categoryProducts: this.data.products,
                page: this.data.products.current_page - 1
            }
        },
        props: ['data', 'translate', 'breadcrumbs'],
        components: {
            StarRating,
            paginate
        },
        methods: {
            clickCallback(newPage){
                if(this.page < newPage){
                    location.href = this.data.products.next_page_url;
                } else {
                    location.href = this.data.products.prev_page_url;
                }


            }
        }
    }
</script>