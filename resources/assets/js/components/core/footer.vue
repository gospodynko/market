<template>
    <footer class="footer-section">
        <div class="head-footer-wrap-bigScreen">
            <div class="head-footer-wrap">
                <div class="site-naw-wrap">
                    <ul class="head-footer-menu">
                        <li>{{translate.company}}</li>
                        <li>{{translate.tool}}</li>
                        <li>{{translate.contacts}}</li>
                        <li>{{translate.address}}</li>
                    </ul>
                </div>
            </div>
            <div class="main-footer-wrap">
                <div class="all-items-menu-wrap">
                    <div class="single-menu-item">
                        <ul class="list-company-info">
                            <li><a href="https://agroyard.ua/news">{{translate.news}}</a></li>
                            <li><a href="https://agroyard.ua/about">{{translate.about}}</a></li>
                            <li><a href="https://agroyard.ua/callback">{{translate.feedback}}</a></li>
                        </ul>
                    </div>
                    <div class="single-menu-item">
                        <ul class="list-company-info">
                            <li><a href="https://agroyard.ua/auctions/all">{{translate.sell_crop}}</a></li>
                            <li><a href="https://agroyard.ua/classifieds/gsm?id=1">{{translate.adv}}</a></li>
                            <li><a href="https://agroyard.ua/auctions/all">{{translate.auction}}</a></li>
                            <!--<li><a href="#">{{translate.tenders}}</a></li>-->
                        </ul>
                    </div>
                    <div class="single-menu-item">
                        <ul class="list-company-info">
                            <li><a href="tel:0800802141">(0800) 80 21 41</a></li>
                            <li><a href="tel:0501992141">(050) 199 21 41</a></li>
                            <li><a href="tel:0961992141">(067) 199 21 41</a></li>
                            <li><a href="tel:0931992141">(093) 199 21 41</a></li>
                            <li><a href="mailto:info@agroyard.com.ua">info@agroyard.ua</a></li>
                        </ul>
                    </div>
                    <div class="single-menu-item">
                        <ul class="list-company-info">
                            <li>{{translate.detail_address_1}}</li>
                            <li>{{translate.detail_address_2}}</li>
                        </ul>
                    </div>
                    <div class="qr-wrap">
                    </div>
                </div>
            </div>
            <div class="partners">
                <div class="info-partners">
                    <p>Завдяки Швейцарсько-українській програмі EGAP «Електронне врядування задля підзвітності влади та участі громади», що виконується Фондом Східна Європа та партнерами, «АгроЯрд Маркет» працює та самовдосконалюється для Вас.</p>
                    <a class="logo_egap" href="http://egap.in.ua/" title="Перейти на сайт EGAP!">
                        <img src="/img/footer/egap.png"/>
                    </a>
                </div>
            </div>
            <div class="bottom-footer-detail">
                <div class="all-det-wrap">
                    <div class="left">
                        <p>&#169; АгроЯрд 2017 г. {{translate.all_right}}</p>
                    </div>
                    <div class="right">
                        <p>{{translate.site_create}}</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer-mobile -->
        <div class="head-footer-wrap-mobile">
                <div class="footer-content">
                    <div class="main-footer-block">
                        <div class="site-naw-wrap-left">
                            <ul class="head-footer-menu">
                                <li class ="general-footer-title">{{translate.company}}</li>
                                <li><a href="https://agroyard.ua/news">{{translate.news}}</a></li>
                                <li><a href="https://agroyard.ua/about">{{translate.about}}</a></li>
                                <li><a href="https://agroyard.ua/callback">{{translate.feedback}}</a></li>
                                <li><router-link :to="{name: 'classifieds', params: {slug: 'gsm'}, query: {id: 1}}">{{translate.tenders}}</router-link></li>
                                <li class ="general-footer-title">{{translate.contacts}}</li>
                                <li class="telephone"><a href="tel:0961992141">(067) 199 21 41</a></li>
                                <li class="telephone"><a href="tel:0931992141">(093) 199 21 41</a></li>
                                <li><a href="mailto:info@agroyard.ua">info@agroyard.ua</a></li>
                            </ul>
                        </div>
                        <div class="site-naw-wrap-right">
                            <ul class="head-footer-menu">
                                <li class ="general-footer-title">{{translate.tool}}</li>
                                <li><a href="https://agroyard.ua/account/auction-create">{{translate.sell_crop}}</a></li>
                                <li><a href="https://agroyard.ua/classifieds/gsm?id=1">{{translate.adv}}</a></li>
                                <li><a href="https://agroyard.ua/auctions/all">{{translate.auction}}</a></li>
                                <li class="telephone right"><a href="tel:0800802141">(0800) 80 21 41</a></li>
                                <li class="telephone"><a href="tel:0501992141">(050) 199 21 41</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class ="location-wrap">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 487.724 487.724" style="enable-background:new 0 0 487.724 487.724;" xml:space="preserve">
    <g>
        <g>
            <path d="M236.925,0.124c-96.9,3.4-177.4,79-186.7,175.5c-1.9,19.3-0.8,38,2.6,55.9l0,0c0,0,0.3,2.1,1.3,6.1    c3,13.4,7.5,26.4,13.1,38.6c19.5,46.2,64.6,123.5,165.8,207.6c6.2,5.2,15.3,5.2,21.6,0c101.2-84,146.3-161.3,165.9-207.7    c5.7-12.2,10.1-25.1,13.1-38.6c0.9-3.9,1.3-6.1,1.3-6.1l0,0c2.3-12,3.5-24.3,3.5-36.9C438.425,84.724,347.525-3.776,236.925,0.124    z M243.825,291.324c-52.2,0-94.5-42.3-94.5-94.5s42.3-94.5,94.5-94.5s94.5,42.3,94.5,94.5S296.025,291.324,243.825,291.324z"/>
        </g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    <g>
    </g>
    </svg>
                        <ul class="list-company-info">
                            <li>{{translate.detail_address_1}}</li>
                            <li>{{translate.detail_address_2}}</li>
                        </ul>
                    </div>
                    <div class="socials">
                        <h3>Соцсети</h3>
                        <div class="soc-ico">
                            <a href="https://www.facebook.com/agroyard/">
                            <img class="img-fb-social-network" src="/img/footer/fb.png" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="partners">
                        <div class="info-partners">
                            <p> «АгроЯрд Маркет» працює та самовдосконалюється завдяки Швейцарсько-українській програмі EGAP </p>
                            <a class="logo_egap" href="http://egap.in.ua/" title="Перейти на сайт EGAP!">
                                <img src="/img/footer/egap.png"/>
                            </a>
                        </div>
                    </div>
                    <div class="bottom-footer-detail">
                        <p>&#169; АгроЯрд 2017 г. {{translate.all_right}}</p>
                        <p>{{translate.site_create}}</p>
                    </div>
                </div>
        </div>
    </footer>
</template>

<script type="text/babel">
    export default {
        data(){
            return {}
        },
        props: [
            'translate'
        ]
    }
</script>