<template>
    <div class="main-content">
        <aside>
            <div class="dropdown">
                <div class="category">
                    <img src="/img/gsm.png" alt="">
                    <span>ППМ</span>
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
                <h4>Всего товаров в магазине: 1685</h4>
                <div class="sort-view">
                    <div class="filters">
                        <h4>сортировать по:</h4>
                        <select>
                            <option>по умолчанию</option>
                            <option>one more option</option>
                            <option>some awesome option</option>
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
                <h3>Засоби захисту рослин</h3>
                <div class="product-items">
                    <div class="product-item">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="product-item">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="product-item">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <!-- list view  -->
                    <div class="product-item list">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!-- list view -->
                    <button class="show-more">ПОКАЗАТЬ ЕЩЕ</button>
                </div>
                <!-- new products list -->
            </div>
            <div id="spares" class="products">
                <h3>Запчастини та шини</h3>
                <div class="product-items">
                    <div class="product-item">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <!--  -->
                    <div class="product-item">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <div class="product-item">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <!-- test list product -->
                    <div class="product-item list">
                        <div class="product-cover">
                            <img src="/img/prod-img.png" alt="">
                        </div>
                        <div class="product-descr">
                            <h4>ТРАКТОР МТ3 синий, красный тюнинг</h4>
                            <h4>10000 грн.</h4>
                        </div>
                        <div class="prod-info">
                            <div class="reviews">
                                <p class="hidden-text">Вакула ФАО 250 Гібрид української селекції ОСОБЛИВОСТІ ГІБРИДУ Високий вихід зерна, добре пере ...</p>
                                <p class="review-counter">45 отзывов</p>
                            </div>
                            <div class="hidden-button">
                                <ul>
                                    <li>Масса конструкционная,кг 5100</li>
                                    <li>Масса эксплуатационная, кг 5260</li>
                                    <li>База, мм 2450</li>
                                </ul>
                                <button>ДЕТАЛЬНЕЕ</button>
                            </div>
                        </div>
                    </div>
                    <button class="show-more">ПОКАЗАТЬ ЕЩЕ</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    export default {
        props: ['shop', 'categories']
    }
</script>