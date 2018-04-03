<template>
    <div>
        <slider-vue :banners="data.banner" :translate="data.translate"></slider-vue>
        <!--<clasfds-vue></clasfds-vue>-->
        <top-product :products="data.productsTop" :translate="data.translate"></top-product>
        <!--<popular-products></popular-products>-->
        <!--<actual-products></actual-products>-->
        <div class="pr-Egap">
            <div class="pr-egap-block">
                <p class="about-egap-challenge">
                    АгроЯрд – переможець першого конкурсу IT-проектів у сфері е-демократії
                    <a href="http://egap-challenge.in.ua/" target="_blank">Egap Challenge</a>
                    та реалізован за підтримки:
                </p>
                <div class="partners-egap">
                    <a href="https://www.eda.admin.ch/" target="_blank"><img src="/img/our_partners/swiss.jpg" alt="swiss"></a>
                    <a href="http://egap.in.ua/" class=""><img class="egaplogobig" src="/img/our_partners/egap.png" alt="egap"> <img class="egaplogolittle" src="/img/our_partners/egap_logo.jpg" alt="egap"></a>
                    <a href="http://eef.org.ua/" target="_blank"><img src="/img/our_partners/easteurope.png" alt="easteurope"></a>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/babel">
    import SliderVue from './slider.vue';
    import ClasfdsVue from  './classified.vue';
    import TopProduct from './top-product.vue';
    import PopularProducts from './popular-products.vue';
    import ActualProducts from './actual-products.vue';
    export default {
        data(){
            return {

            }
        },
        props: ['data'],
        components: {
            SliderVue,
            ClasfdsVue,
            TopProduct,
            PopularProducts,
            ActualProducts
        }
    }
</script>