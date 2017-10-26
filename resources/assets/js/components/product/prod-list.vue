<template>
    <section class="single-prod-sect">
        <div class="overlay" style="z-index: 6" :class="{'show': showAuthorized}" @click="closeAuth"></div>
        <div class="unauthorized-user-popup" v-if="showAuthorized">
            <div class="head">
                <h2>
                    {{translate.need_auth}}
                </h2>
                <span class="close" @click="closeAuth"></span>
            </div>
            <div class="main">
                <a href="/login" class="btn">{{translate.auth}}</a>
                <a href="#" class="btn">{{translate.reg}}</a>
            </div>
        </div>
        <div class="single-prod-wrap">
            <div class="breadcrumbs">
                <div v-html="breadcrumbs"></div>
            </div>
            <div class="single-prod-detail">
                <div class="detail-product-wrap">
                    <div class="shop-gallery">
                        <div class="small-photos">
                            <div class="single-small-photo" v-for="(smallImage, index) in product.pictures" @click="checkImages(smallImage)" :class="{'active': checkImage == smallImage.path}" v-if="index <= 3">
                                <img :src="smallImage.path" alt="">
                            </div>
                            <!--<p class="show-all">еще 6</p>-->
                        </div>
                        <div class="full-photo">
                            <img :src="checkImage" alt="">
                        </div>
                        <div class="product-options" v-if="false">
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
                                <a href="#" class="feedback-link" @click="showReviews">{{translate.reviews}} {{product.reviews.length}}</a>
                            </div>
                            <div class="right">
                                <p>id {{product.id}}</p>
                            </div>
                        </div>
                        <div class="price-wrap two-wrap">
                            <div class="left">
                                <p class="price">
                                    {{translate.prices}}: {{product.price_min !== product.price_max ? product.price_min + ' - ' + product.price_max : product.price_max}} грн
                                </p>
                                <p class="in-sale">
                                    {{translate.all_goods}}: {{data.storesProducts.length}} шт
                                </p>
                            </div>
                            <div class="right">
                            </div>
                        </div>
                        <div class="prod-desc-wrap">
                            <h2>{{translate.description}}</h2>
                            <p v-html="product.description"></p>
                        </div>
                    </div>
                    <div class="detail-post-info">
                        <div class="type-payment-wrap" v-if="false">
                            <div class="post-info">
                                <p>{{translate.delivery}}</p>
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
                                <p>{{translate.all_goods_list}}</p>
                            </div>
                            <div class="single-tab" @click="productTab = 'charact'" :class="{'active': productTab === 'charact'}">
                                <p>{{translate.charact}}</p>
                            </div>
                            <div class="single-tab" @click="productTab = 'feedback'" :class="{'active': productTab === 'feedback'}">
                                <p>
                                    {{translate.reviews_list}} {{reviews.length ? '('+reviews.length+')' : ''}}
                                </p>
                            </div>

                        </div>
                        <div class="all-tabs-detail">
                            <div class="single-tab-detail characteristic" v-if="productTab === 'charact'">
                                <h2>{{translate.charact}}</h2>
                                <div v-for="feature in features">
                                    <h3>{{feature.name}}</h3>
                                    <div v-for="param in feature.params">
                                        <p><span>{{param.title}}</span><span>{{param.param}}</span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="single-tab-detail market-list-wrap" v-if="productTab === 'store'">
                                <div class="market-list-all">
                                    <div class="single-market" v-for="store in data.storesProducts">
                                        <div class="logo-shop-wrap">
                                            <img src="/img/avatars/ava.jpg" alt="">
                                        </div>
                                        <div class="shop-detail-wrap">
                                            <h2>{{store.shop ? store.shop.name : 'магазин удален'}}</h2>
                                            <div class="star-wrap">
                                                <star-rating :star-size="20"></star-rating>
                                                <a href="#">145 {{translate.reviews}}</a>
                                            </div>
                                        </div>
                                        <div class="price-wrap">
                                            <p class="price">{{translate.price}} {{store.price}} грн {{store.quantity_price ? '/ '+store.quantity_price : ''}}</p>
                                            <p class="prod-status">{{translate.in_market}}</p>
                                        </div>
                                        <div class="go-shop-wrap">
                                            <button class="btn" @click="addToCart(store)">{{translate.in_cart}}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="single-tab-detail feedback-list-wrap" v-if="productTab === 'feedback'">
                                <div class="feedback-head-wrap two-wrap">
                                    <div class="left">
                                        <h3>{{translate.all_reviews}} ({{reviews.length}})</h3>
                                        <div class="sort-wrap">
                                            <p class="bold">
                                                <!--<span class="bold">Сортировать: </span>-->
                                                <!--<span>-->
                                                    <!--по дате-->
                                                <!--</span>-->
                                                <!--<span>-->
                                                    <!--по оценке-->
                                                <!--</span>-->
                                            </p>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <button class="btn" @click="showReviews">{{translate.create_review}}</button>
                                    </div>
                                </div>
                                <div class="new-review" v-if="showReview">
                                    <textarea name="" id="" cols="30" rows="10" v-model="reviewText"></textarea>
                                    <button class="btn send-review" @click="sendReview">{{translate.send}}</button>
                                </div>
                                <div class="all-feedback-list-wrap">
                                    <div class="single-answer" v-for="review in reviews">
                                        <div class="comment-head">
                                            <div class="logo-user">
                                                <img src="/img/avatars/ava.jpg" alt="">
                                            </div>
                                            <div class="star-rating-wrap">
                                                <p class="user-name">{{review.user.first_name + ' ' + review.user.last_name}}</p>
                                                <div class="rating-wrap">
                                                    <!--<span class="rating">Рейтинг </span><star-rating :star-size="20"></star-rating>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wrap">
                                            <p class="comment">
                                                {{review.text}}
                                            </p>
                                            <div class="action-wrap">
                                                <p class="date">{{moment(review.created_at).format('LLL')}}</p>
                                                <span class="action-link">{{translate.answer}}</span>
                                            </div>
                                        </div>
                                        <!--<div class="comment-answer">-->
                                            <!--<div class="comment-head">-->
                                                <!--<div class="logo-user">-->
                                                    <!--<img src="/img/avatars/ava.jpg" alt="">-->
                                                <!--</div>-->
                                                <!--<div class="star-rating-wrap">-->
                                                    <!--<p class="user-name">Артур Пирожков (Менеджер "Рога и Копыта" отвечает)</p>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                            <!--<div class="comment-wrap">-->
                                                <!--<p class="comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit.-->
                                             <!--Aspernatur autem, eligendi excepturi facere minima nemo nihil-->
                                              <!--odio perferendis temporibus.-->
                                             <!--Assumenda aut qui ullam veritatis. Dignissimos earum ipsum maxime-->
                                              <!--sunt veritatis.</p>-->
                                                <!--<div class="action-wrap">-->
                                                    <!--<p class="date">21 августа 2017г</p>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                        <!--</div>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
            <div class="compare-products" v-if="data.suggestions.length">
                <h2>{{translate.compare_goods}}</h2>
                <div class="all-products-list">
                    <div class="single-product" v-for="product in data.suggestions">
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
                                    <!--<ul>-->
                                        <!--&lt;!&ndash;<li>Масса конструкционная, кг	5100</li>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<li>Масса эксплуатационная, кг	5260</li>&ndash;&gt;-->
                                        <!--&lt;!&ndash;<li>База , мм	2450</li>&ndash;&gt;-->
                                        <!--<li>{{product.description}}</li>-->
                                    <!--</ul>-->
                                <!--</div>-->
                                <div class="all-goods-btn">
                                    <a :href="'/products/'+product.slug" class="btn">
                                        {{translate.all_goods_list}}
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
    </section>
</template>

<script type="text/babel">
    import StarRating from 'vue-star-rating';
    import {Events} from './../../app';
    import moment from 'moment';
    export default {
        data(){
            return {
                product: this.data.product,
                productTab: 'store',
                checkImage: this.data.product.pictures.length && this.data.product.pictures[0].hasOwnProperty('path') ? this.data.product.pictures[0].path : '',
                reviews: this.data.product.reviews,
                reviewText: '',
                showReview: false,
                features: JSON.parse(this.data.product.features),
                showAuthorized: false
            }
        },
        props: ['data', 'user', 'translate', 'breadcrumbs'],
        components: {
            StarRating
        },
        created(){
            this.product.description = this.product.description.replace(/(?:\r\n|\r|\n)/g, '<br>');
        },
        methods: {
            checkImages(img){
                this.checkImage = img.path;
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
            },
            moment(time){
                return moment(time).locale('ru');
            },
            sendReview(){
                if(!this.reviewText) return false;
                this.$http.post('/products/'+this.product.slug+'/send-review', {'text': this.reviewText}).then(res => {
                    this.reviews.unshift(res.data.review);
                    this.showReview = false;
                    this.reviewText = '';
                }, err => {

                })
            },
            showReviews(e){
                e.preventDefault();
                if(!this.user){
                    this.showAuthorized = true;
                }
                if(this.productTab !== 'feedback'){
                    this.productTab = 'feedback';
                }
                this.showReview = !this.showReview;
            },
            closeAuth(){
                this.showAuthorized = !this.showAuthorized;

            }

        }
    }
</script>