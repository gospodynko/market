<template>
    <section class="top-product">
        <div class="top-product-wrap">
            <h2>Популярные товары</h2>
            <div class="popular-categories">
                <div class="all-populars-list">
                    <div class="single-popular-cat size600">
                        <p class="text-wrap">
                            Аренда сельскохозяйственной техники в Украине
                        </p>
                        <img src="/img/products/category-img-1.jpg" alt="">
                    </div>
                    <div class="single-popular-cat size320">
                        <p class="text-wrap">
                            Товары для отдыха
                        </p>
                        <img src="/img/products/category-img-2.jpg" alt="">
                    </div>
                    <div class="single-popular-cat size320">
                        <p class="text-wrap">
                            Услуги логистики
                        </p>
                        <img src="/img/products/category-img-3.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="all-products-list">
                <div class="single-product" v-for="n in 12">
                    <div class="img-wrap">
                        <img src="/img/products/tr.jpg" alt="">
                    </div>
                    <div class="detail-wrap">
                        <p class="product-title">
                            Трактора МТЗ синий, красный ТЮНИНГОВАНИЙ
                        </p>
                        <p class="price">
                            10 000 - 25 000 грн.
                        </p>
                    </div>
                    <div class="detail-prod-wrap">
                        <div class="feedback-wrap">
                            <div class="rating-wrap">
                                <star-rating :star-size="20"></star-rating>
                            </div>
                            <div class="count-feedback-wrap">
                                <a href="#">45 отзывов</a>
                            </div>
                        </div>
                        <div class="all-detail-list">
                            <ul>
                                <li>Масса конструкционная, кг	5100</li>
                                <li>Масса эксплуатационная, кг	5260</li>
                                <li>База , мм	2450</li>
                            </ul>
                        </div>
                        <div class="hide-list-wrap">
                            <div class="all-detail-list">
                                <ul>
                                    <li>Масса конструкционная, кг	5100</li>
                                    <li>Масса эксплуатационная, кг	5260</li>
                                    <li>База , мм	2450</li>
                                </ul>
                            </div>
                            <div class="all-goods-btn">
                                <button class="btn">
                                    Все предложения
                                </button>
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
                <div class="show-all-btn-wrap">
                    <button class="btn">Показать все</button>
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    import StarRating from 'vue-star-rating';
    export default {
        data(){
            return {

            }
        },
        components: {
            StarRating
        }
    }
</script>