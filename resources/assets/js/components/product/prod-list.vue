<template>
    <section class="single-prod-sect">
        <div class="sps-adres" v-if="showAdres">
            <div class="sps-adres-header">
                <span class="circle-close" @click.prevent="callShowAdres">x</span>
                {{product.user_shop.company.address}}
                <img :src="'https://maps.googleapis.com/maps/api/staticmap?center=' + product.user_shop.company.address + '&zoom=13&size=600x300&maptype=roadmap&markers=color:green%7Clabel:G%7C40.711614,-74.012318&markers=color:red%7Clabel:C%7C40.718217,-73.998284&key=AIzaSyDsGaGMT-t0qFIwMM3j2nY0Hc5LcTmRNzY'" alt="">
            </div>
        </div>

        <div class="sps-contacts" v-if="showPhone">
            <div class="sps-contacts-header">
                <span class="circle-close" @click.prevent="callShowPhone">x</span>
                Контакти
            </div>
            <ul>
                <li v-for="tel in product.user_shop.phones">{{tel}}</li>
            </ul>
        </div>
        <div class="overlay-contacts" v-if="showPhone || showAdres" @click.prevent="closeAll"></div>
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
                            <span v-if="product.pictures.length > 3" class="small-photos-btn small-photos-btn-prev" @click.prevent="scrollPrev"></span>
                            <div class="single-small-photo" v-for="(smallImage, index) in product.pictures.slice(galleryStart, galleryEnd)" @click="checkImages(smallImage)" :class="{'active': checkImage == smallImage.path}" v-if="index <= 3">
                                <img :src="smallImage.path" alt="">
                            </div>
                            <span v-if="product.pictures.length > 3" class="small-photos-btn small-photos-btn-next" @click.prevent="scrollNext"></span>
                            <!--<p class="show-all">еще 6</p>-->
                        </div>
                        <div class="full-photo">
                            <img :src="checkImage" alt="">
                        </div>
                        <div class="product-options" v-if="false">
                            <div class="find-good">
                                <i></i>
                                <p class="find-good-action">Відстежити товар</p>
                            </div>
                            <div class="faworite">
                                <i></i>
                                <p class="faworite-action">В обране</p>
                            </div>
                            <div class="compare">
                                <i></i>
                                <p class="compare-action">Сравнение</p>
                            </div>
                        </div>
                    </div>
                    <div class="detail-description">
                        <h1>{{product.name}}
                        </h1>
                        <div class="feedback-wrap two-wrap">
                            <div class="left">
                                <star-rating :star-size="20" :increment="0.01" :rating=product.rate :read-only="true" :show-rating="true"></star-rating>
                                <a href="#" class="feedback-link" @click="showReviews">{{translate.reviews}} {{product.reviews.length}}</a>
                            </div>
                        </div>
                        <div class="price-wrap two-wrap">
                            <div class="left">
                                <p class="in-sale">
                                    {{translate.all_goods}}: {{data.otherProducts.length}} шт
                                </p>
                            </div>
                            <div class="right">
                            </div>
                        </div>
                        <div class="prod-desc-wrap">
                            <h2>{{translate.description}}</h2>
                            <p v-html="product.description.slice(0, textLength) || translate.no_description"></p>
                            <a v-if="product.description.length >= 400"
                               @click.prevent="viewAll"
                               href=""
                               class="prod-desc-wrap-link">
                                <i v-bind:class="{ arrowDown: textLength > 400 }" class="arrowUp"></i>
                                {{translate.more}}
                            </a>
                        </div>
                    </div>

                    <div class="detail-info">
                        <div class="di-header">
                            <span class="di-header-id">id {{product.id}}</span>
                            <span class="di-header-view" v-if="false">{{product.view_counts}}</span>
                        </div>
                        <div class="di-price">
                            {{numberWithSpaces(product.price)}} {{product.currency.name}}
                        </div>
                        <button  class="di-buy" @click="addToCart(product)">{{translate.in_cart}}</button>
                        <div class="di-info">
                            <div class="di-info-img">
                                <img :src=product.user_shop.logo :alt=product.user_shop.name v-if="product.user_shop.logo">
                                <img src="/img/avatars/ava.png" alt="" v-else>
                            </div>
                            <h3><a :href="'/shop/' + product.user_shop.slug">{{product.user_shop.name}}</a></h3>
                            <div class="di-info-adres" @click.prevent="callShowAdres">
                                Адрес
                            </div>
                            <div class="di-info-phone" @click.prevent="callShowPhone">
                                Номер телефону
                            </div>
                            <div class="di-info-rate">
                                рейтинг:
                                <star-rating :star-size="20" :increment="0.01" :rating=product.user_shop.rate :read-only="true"></star-rating>
                            </div>
                        </div>
                    </div>

                    <div class="datail-service">
                        <div class="ds-pay">
                            <h3>Спосіб оплати</h3>
                            <ul>
                                <li v-for="pay in product.pay_types">
                                    <img :src=pay.logo :alt=pay.name :title="pay.name">
                                </li>
                            </ul>
                        </div>

                        <div class="del-pay">
                            <h3>Доставка</h3>
                        <ul>
                            <li v-for="del in product.delivery_types">
                                <img :src=del.logo :alt=del.name :title="del.name">
                            </li>
                        </ul>
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
                            <div class="single-tab" @click="productTab = 'charact'" :class="{'active': productTab === 'charact'}">
                                <p>{{translate.charact}}</p>
                            </div>
                            <div class="single-tab" @click="productTab = 'feedback'" :class="{'active': productTab === 'feedback'}">
                                <p>
                                    {{translate.reviews_list}} {{reviews.length ? '('+reviews.length+')' : ''}}
                                </p>
                            </div>
                            <div class="single-tab" @click="productTab = 'store'" :class="{'active': productTab === 'store'}">
                                <p>{{translate.compare_goods}}</p>
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
                                <div class="compare-products" v-if="data.suggestions.length">
                                    <div class="all-products-list">
                                        <div class="single-product" v-for="product in data.suggestions">
                                            <div class="img-wrap">
                                                <a :href="'/shop/' + product.user_shop.slug + '/' + product.slug">
                                                    <img :src="'../../' + product.default_picture" alt="">
                                                </a>
                                            </div>
                                            <div class="detail-wrap">
                                                <p class="product-title">
                                                    <a :href="'/shop/' + product.user_shop.slug + '/' + product.slug">{{product.name}}</a>
                                                </p>
                                                <p class="price">
                                                    <!--{{numberWithSpaces(product.price_min !== product.price_max ? product.price_min + ' - ' + product.price_max : product.price_max)}} грн.-->
                                                    {{numberWithSpaces(product.price)}} {{product.currency.name}}
                                                </p>
                                            </div>
                                            <div class="detail-prod-wrap">
                                                <div class="feedback-wrap">
                                                    <div class="rating-wrap">
                                                        <star-rating :star-size="20" :increment="0.01" :rating=product.rate :read-only="true" :show-rating="false"></star-rating>
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
                                                        <a :href="'/shop/' + product.user_shop.slug + '/' + product.slug" class="btn">
                                                            {{translate.more}}
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
                                        <!--<button class="btn" @click="showReviews">{{translate.create_review}}</button>-->
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
                                                <img :src=review.user.profile_photo alt="">
                                                <!--<img src="/img/avatars/ava.png" alt="">-->
                                            </div>
                                            <div v-if="review.user" class="star-rating-wrap">
                                                <p class="user-name">{{review.user.first_name + ' ' + review.user.last_name}}</p>
                                                <div class="rating-wrap">
                                                    <span class="rating">Рейтинг </span>
                                                    <star-rating :star-size="20" :increment="0.01" :rating=review.rate :read-only="true" :show-rating="false"></star-rating>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-wrap">
                                            <p class="comment">
                                                {{review.text}}
                                            </p>
                                            <div class="action-wrap">
                                                <p class="date">{{moment(review.updated_at).format('LLL')}}</p>
                                                <!--<span class="action-link">{{translate.answer}}</span>-->
                                            </div>
                                        </div>

                                        <div class="comment-answer" v-for="answer in review.answers">
                                            <div class="comment-head">
                                                <div class="logo-user">
                                                    <img :src=answer.user.profile_photo alt="">
                                                </div>
                                                <div class="star-rating-wrap">
                                                    <p class="user-name">{{answer.user.first_name + ' ' + answer.user.last_name}}</p>
                                                </div>
                                            </div>
                                            <div class="comment-wrap">
                                                <p class="comment">{{answer.text}}</p>
                                                <div class="action-wrap">
                                                    <p class="date">{{moment(answer.updated_at).format('LLL')}}</p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-if="data.otherProducts.length > 0" class="market-list-all">
                <h2>Всі пропозиції</h2>
                <div class="single-market" v-for="store in data.otherProducts">
                    <div class="logo-shop-wrap">
                        <a :href="'/shop/' + store.user_shop.slug + '/' + store.slug">
                            <img :src="'../../' + store.default_picture" alt="">
                        </a>
                        <!--<img src="/img/avatars/ava.png" alt="" v-else>-->
                    </div>
                    <div class="shop-detail-wrap">
                        <!--<h2>{{store.shop ? store.shop.name : 'магазин удален'}}</h2>-->
                        <a :href="'/shop/' + store.user_shop.slug + '/' + store.slug">
                            <h2>{{store.name}}</h2>
                        </a>
                        <div class="star-wrap">
                            <star-rating :star-size="20" :increment="0.01" :rating=store.rate :read-only="true" :show-rating="false"></star-rating>
                            <a href="#">{{store.reviews.length}} {{translate.reviews}}</a>
                        </div>
                    </div>
                    <div class="price-wrap">
                        <p class="price">{{translate.price}}
                            <!--{{numberWithSpaces(store.price)}} грн {{store.quantity_price ? '/ '+store.quantity_price : ''}}</p>-->
                            {{numberWithSpaces(store.price)}} {{store.currency.name}}</p>
                        <!--<p class="prod-status">{{translate.in_market}}</p>-->
                    </div>
                    <div class="go-shop-wrap">
                        <!--<button class="btn" @click="addToCart(store)">{{translate.detailed}}</button>-->
                        <a class="btn btnLink" :href="'/shop/' + store.user_shop.slug + '/' + store.slug">{{translate.detailed}}</a>
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
                showPhone: false,
                showAdres: false,
                product: this.data.product,
                productTab: 'charact',
                checkImage: this.data.product.pictures.length && this.data.product.pictures[0].hasOwnProperty('path') ? this.data.product.pictures[0].path : '',
                reviews: this.data.product.reviews,
                reviewText: '',
                showReview: false,
                features: JSON.parse(this.data.product.features),
                showAuthorized: false,
                textLength: 400,
                galleryStart: 0,
                galleryEnd: 3
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
            callShowPhone () {
              this.showPhone = !this.showPhone
            },
            callShowAdres () {
                this.showAdres = !this.showAdres
            },
            closeAll () {
                this.showAdres = false
                this.showPhone = false
            },
            scrollPrev () {
                if (this.galleryEnd === 3) {
                    this.galleryStart =  this.product.pictures.length - 3
                    this.galleryEnd =  this.product.pictures.length
                } else {
                    this.galleryStart =  this.galleryStart - 1
                    this.galleryEnd =  this.galleryEnd - 1
                }
            },
            scrollNext () {
                if (this.galleryEnd === this.product.pictures.length) {
                    this.galleryStart =  0
                    this.galleryEnd =  3
                } else {
                    this.galleryStart =  this.galleryStart + 1
                    this.galleryEnd =  this.galleryEnd + 1
                }
            },
            numberWithSpaces(x) {
                return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
            },
            viewAll() {
                if (this.textLength == 400) {
                    this.textLength = this.product.description.length;
                } else {
                    this.textLength = 400;
                }
            },
            checkImages(img){
                this.checkImage = img.path;
            },
            addToCart(item){
                console.log(item)
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

<style>
    .small-photos{
        height: 0;
    }
</style>