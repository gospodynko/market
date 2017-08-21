<template>
    <section class="search-sect">
        <div class="search-wrap">
            <div class="breadcrumbs"></div>
            <div class="info-search-head-wrap">
                <div class="found-list">
                    <h2>Найдено 1580 результатов в 48 категориях</h2>
                </div>
                <div class="filters-list">
                    <div class="my-region-wrap">
                        <input type="checkbox" id="my-region-check">
                        <label for="my-region-check">
                            <span>Сначала предложения в моем регионе</span>
                        </label>
                    </div>
                    <div class="sort-wrap">
                        <span>Сортировать по:</span>
                        <select>
                            <option value="1">по умолчанию</option>
                        </select>
                    </div>
                    <div class="type-view">
                        <p><span>Вид:</span> <i class="table"></i><i class="list"></i></p>
                    </div>
                </div>
            </div>
            <div class="search-content-wrap">
                <div class="chose-filters-head">
                    <h3>Выбранные фильтры: </h3>
                    <div class="all-chose-filters">
                        <div class="single-filter">
                            <p class="name">Имя выбранного фильтра</p>
                            <span class="close"></span>
                        </div>
                        <div class="single-filter">
                            <p class="name">Фильтр</p>
                            <span class="close"></span>
                        </div>
                        <div class="single-filter">
                            <p class="name">Днепр</p>
                            <span class="close"></span>
                        </div>
                        <div class="single-filter">
                            <p class="name">Porshe 911</p>
                            <span class="close"></span>
                        </div>
                        <div class="single-filter">
                            <p class="name">Овен</p>
                            <span class="close"></span>
                        </div>
                    </div>
                </div>
                <div class="main-search-content">
                    <div class="filter-wrap">
                        <div class="price-wrap">
                            <h3><i></i>Цена</h3>
                            <div class="price-sect">
                                <span>От</span>
                                <input type="text">
                                <span class="to">До</span>
                                <input type="text">
                            </div>
                        </div>
                        <div class="status-product">
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
                        <div class="shop-rating-list">
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
                        <div class="status-product">
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
                    <div class="content-wrap">
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
                        </div>
                    </div>
                </div>
                <div class="footer-search-wrap">
                    <div class="paginate-wrap">
                        <ul class="paginate">
                            <li class="prev"><i></i> Назад</li>
                            <li>1</li>
                            <li class="active">2</li>
                            <li>3</li>
                            <li class="next">Вперед <i></i></li>
                        </ul>
                    </div>
                    <div class="chose-page">
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

    export default{
        data(){
            return {

            }
        },
        components: {
            StarRating
        }
    }
</script>