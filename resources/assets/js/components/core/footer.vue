<template>
    <footer class="footer-section">
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
                        <li><a href="#">{{translate.news}}</a></li>
                        <li><a href="#">{{translate.about}}</a></li>
                        <li><a href="#">{{translate.feedback}}</a></li>
                    </ul>
                </div>
                <div class="single-menu-item">
                    <ul class="list-company-info">
                        <li><a href="#">{{translate.sell_crop}}</a></li>
                        <li><a href="#">{{translate.add_adv}}</a></li>
                        <li><a href="#">{{translate.adv}}</a></li>
                        <li><a href="#">{{translate.auction}}</a></li>
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