<template>
    <div>
        <slider-vue :banners="data.banner"></slider-vue>
        <!--<clasfds-vue></clasfds-vue>-->
        <top-product :products="data.productsTop"></top-product>
        <!--<popular-products></popular-products>-->
        <!--<actual-products></actual-products>-->
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