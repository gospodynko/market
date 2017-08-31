<template>
    <section class="single-prod-sect">
        <div class="single-prod-wrap">
            <div class="breadcrumbs">

            </div>
            <div class="single-prod-detail">
                <div class="detail-product-wrap">
                    <div class="shop-gallery">
                        <div class="small-photos">
                            <div class="single-small-photo" v-for="(smallImage, index) in product.images" @click="checkImages(smallImage)" :class="{'active': checkImage == smallImage}" v-if="index <= 3">
                                <img :src="smallImage" alt="">
                            </div>
                            <!--<p class="show-all">еще 6</p>-->
                        </div>
                        <div class="full-photo">
                            <img :src="checkImage" alt="">
                        </div>
                        <div class="product-options">
                            <div class="find-good">
                                <i></i>
                                <p class="find-good-action"> Отслеживать товар</p>
                            </div>
                            <div class="faworite">
                                <i></i>
                                <p class="faworite-action">В избранное</p>
                            </div>
                            <div class="compare">
                                <i></i>
                                <p class="compare-action">Сравнение</p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-description">
                        <h1>{{product.name}}</h1>
                        <div class="feedback-wrap two-wrap">
                            <div class="left">
                                <star-rating :star-size="20"></star-rating>
                                <a href="#" class="feedback-link">Отзывов 1965</a>
                            </div>
                            <div class="right">
                                <p>id {{product.id}}</p>
                            </div>
                        </div>
                        <div class="price-wrap two-wrap">
                            <div class="left">
                                <p class="price">
                                    Цены: {{product.price_min !== product.price_max ? product.price_min + ' - ' + product.price_max : product.price_max}} грн
                                </p>
                                <p class="in-sale">
                                    Всего предложений: {{data.storesProducts.length}} шт
                                </p>
                            </div>
                            <div class="right">
                            </div>
                        </div>
                        <div class="prod-desc-wrap">
                            <h2>Описание</h2>
                            <p>{{product.description}}</p>
                        </div>
                    </div>
                    <div class="detail-post-info">
                        <div class="type-payment-wrap" v-if="false">
                            <div class="post-info">
                                <p>Доставка</p>
                                <div class="all-post-list">
                                    <div class="single-post-list">
                                        <img src="/img/payments/np.png" alt="">
                                    </div>
                                    <div class="single-post-list">
                                        <img src="/img/payments/int.png" alt="">
                                    </div>
                                    <div class="single-post-list">
                                        <img src="/img/payments/up.png" alt="">
                                    </div>
                                </div>
                            </div>
                            <div class="payment-info">
                                <p>Оплата</p>
                                <div class="all-payment-list">
                                    <div class="single-payment">
                                        <img src="/img/payments/webmoney.png" alt="">
                                    </div>
                                    <div class="single-payment">
                                        <img src="/img/payments/visa.png" alt="">
                                    </div>
                                    <div class="single-payment">
                                        <img src="/img/payments/mcard.png" alt="">
                                    </div>
                                    <div class="single-payment">
                                        <img src="/img/payments/pp.png" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="all-tabs-menu">
                            <div class="single-tab" @click="productTab = 'store'" :class="{'active': productTab === 'store'}">
                                <p>Все предложения</p>
                            </div>
                            <div class="single-tab" @click="productTab = 'charact'" :class="{'active': productTab === 'charact'}">
                                <p>Характеристики</p>
                            </div>
                            <div class="single-tab" @click="productTab = 'feedback'" :class="{'active': productTab === 'feedback'}">
                                <p>
                                    Отзывы (10)
                                </p>
                            </div>

                        </div>
                        <div class="all-tabs-detail">
                            <div class="single-tab-detail characteristic" v-if="productTab === 'charact'">
                                <h2>Характеристики</h2>
                                <p><span>Производитель</span><span>Дніпро-М</span></p>
                                <p><span>Страна производитель</span> <span>Украина</span></p>
                                <p><span>Производитель</span><span>Дніпро-М</span></p>

                                <h3>Габаритные размеры</h3>

                                <p><span>Вес</span> <span>1.3 (кг)</span></p>
                                <p><span>Максимальный диаметр сверления</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (дерево)</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (металл)</span><span>7.0 (мм)</span></p>
                                <h3>Габаритные размеры</h3>

                                <p><span>Вес</span> <span>1.3 (кг)</span></p>
                                <p><span>Максимальный диаметр сверления</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (дерево)</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (металл)</span><span>7.0 (мм)</span></p>
                                <h3>Габаритные размеры</h3>

                                <p><span>Вес</span> <span>1.3 (кг)</span></p>
                                <p><span>Максимальный диаметр сверления</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (дерево)</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (металл)</span><span>7.0 (мм)</span></p>
                                <h3>Габаритные размеры</h3>

                                <p><span>Вес</span> <span>1.3 (кг)</span></p>
                                <p><span>Максимальный диаметр сверления</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (дерево)</span><span>18.0 (мм)</span></p>
                                <p><span>Максимальный диаметр сверления (металл)</span><span>7.0 (мм)</span></p>
                            </div>
                            <div class="single-tab-detail market-list-wrap" v-if="productTab === 'store'">
                                <div class="market-list-all">
                                    <div class="single-market" v-for="store in data.storesProducts">
                                        <div class="logo-shop-wrap">
                                            <img src="/img/avatars/ava.jpg" alt="">
                                        </div>
                                        <div class="shop-detail-wrap">
                                            <h2>{{store.created_by_user.first_name + ' ' + store.created_by_user.last_name}}</h2>
                                            <div class="star-wrap">
                                                <star-rating :star-size="20"></star-rating>
                                                <a href="#">145 Отзывов</a>
                                            </div>
                                        </div>
                                        <div class="price-wrap">
                                            <p class="price">цена {{store.price}} грн</p>
                                            <p class="prod-status">В наличии</p>
                                        </div>
                                        <div class="go-shop-wrap">
                                            <button class="btn" @click="addToCart(store)">В корзину</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-tab-detail feedback-list-wrap" v-if="productTab === 'feedback'">
                                <div class="feedback-head-wrap two-wrap">
                                    <div class="left">
                                        <h3>Все отзывы (10)</h3>
                                        <div class="sort-wrap">
                                            <p class="bold">
                                                <span class="bold">Сортировать: </span>
                                                <span>
                                                    по дате
                                                </span>
                                                <span>
                                                    по оценке
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <button class="btn">Написать отзыв</button>
                                    </div>
                                </div>
                                <div class="all-feedback-list-wrap">
                                    <div class="single-answer">
                                        <div class="comment-head">
                                            <div class="logo-user">
                                                <img src="/img/avatars/ava.jpg" alt="">
                                            </div>
                                            <div class="star-rating-wrap">
                                                <p class="user-name">Артур Пирожков</p>
                                                <div class="rating-wrap">
                                                    <span class="rating">Рейтинг </span><star-rating :star-size="20"></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wrap">
                                            <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.</p>
                                            <div class="action-wrap">
                                                <p class="date">21 августа 2017г</p>
                                                <span class="action-link">Ответить</span>
                                            </div>
                                        </div>
                                        <div class="comment-answer">
                                            <div class="comment-head">
                                                <div class="logo-user">
                                                    <img src="/img/avatars/ava.jpg" alt="">
                                                </div>
                                                <div class="star-rating-wrap">
                                                    <p class="user-name">Артур Пирожков (Менеджер "Рога и Копыта" отвечает)</p>
                                                </div>
                                            </div>
                                            <div class="comment-wrap">
                                                <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.</p>
                                                <div class="action-wrap">
                                                    <p class="date">21 августа 2017г</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-answer">
                                        <div class="comment-head">
                                            <div class="logo-user">
                                                <img src="/img/avatars/ava.jpg" alt="">
                                            </div>
                                            <div class="star-rating-wrap">
                                                <p class="user-name">Артур Пирожков</p>
                                                <div class="rating-wrap">
                                                    <span class="rating">Рейтинг </span><star-rating :star-size="20"></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wrap">
                                            <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.
                                              Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.
                                                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.
                                              </p>
                                            <div class="action-wrap">
                                                <p class="date">21 августа 2017г</p>
                                                <span class="action-link">Ответить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-answer">
                                        <div class="comment-head">
                                            <div class="logo-user">
                                                <img src="/img/avatars/ava.jpg" alt="">
                                            </div>
                                            <div class="star-rating-wrap">
                                                <p class="user-name">Артур Пирожков</p>
                                                <div class="rating-wrap">
                                                    <span class="rating">Рейтинг </span><star-rating :star-size="20"></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wrap">
                                            <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.</p>
                                            <div class="action-wrap">
                                                <p class="date">21 августа 2017г</p>
                                                <span class="action-link">Ответить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-answer">
                                        <div class="comment-head">
                                            <div class="logo-user">
                                                <img src="/img/avatars/ava.jpg" alt="">
                                            </div>
                                            <div class="star-rating-wrap">
                                                <p class="user-name">Артур Пирожков</p>
                                                <div class="rating-wrap">
                                                    <span class="rating">Рейтинг </span><star-rating :star-size="20"></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wrap">
                                            <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.</p>
                                            <div class="action-wrap">
                                                <p class="date">21 августа 2017г</p>
                                                <span class="action-link">Ответить</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-answer">
                                        <div class="comment-head">
                                            <div class="logo-user">
                                                <img src="/img/avatars/ava.jpg" alt="">
                                            </div>
                                            <div class="star-rating-wrap">
                                                <p class="user-name">Артур Пирожков</p>
                                                <div class="rating-wrap">
                                                    <span class="rating">Рейтинг </span><star-rating :star-size="20"></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wrap">
                                            <p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                             Aspernatur autem, eligendi excepturi facere minima nemo nihil
                                              odio perferendis temporibus.
                                             Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime
                                              sunt veritatis.</p>
                                            <div class="action-wrap">
                                                <p class="date">21 августа 2017г</p>
                                                <span class="action-link">Ответить</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="compare-products">
                <h2>Похожие товары</h2>
                <div class="all-products-list">
                    <div class="single-product" v-for="n in 4">
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
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/babel">
    import StarRating from 'vue-star-rating';
    import {Events} from './../../app';
    export default {
        data(){
            return {
                product: this.data.product,
                productTab: 'store',
                checkImage: this.data.product.images[0]
            }
        },
        props: ['data'],
        components: {
            StarRating
        },
        methods: {
            checkImages(img){
                this.checkImage = img;
            },
            addToCart(item){
                var userBuys = JSON.parse(localStorage.getItem('cart'));
                item.store_count = 0;
                if(!userBuys){
                    userBuys = [];
                }
                if(userBuys.length){
                   userBuys.forEach(buy => {
                       if(buy.store.id == item.id){
                           ++buy.store.store_count;
                           ++item.store_count;
                       }
                   })
                }
                if(!item.store_count){
                    item.store_count = 1;
                    userBuys.push({
                        store: item,
                        product: this.product
                    });
                }
                localStorage.setItem('cart', JSON.stringify(userBuys));
                Events.$emit('newCartItem', true);
            }
        }
    }
</script>