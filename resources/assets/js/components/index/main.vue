<template>
    <div>
        <slider-vue></slider-vue>
        <clasfds-vue></clasfds-vue>
        <top-product></top-product>
        <popular-products></popular-products>
        <actual-products></actual-products>
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
        components: {
            SliderVue,
            ClasfdsVue,
            TopProduct,
            PopularProducts,
            ActualProducts
        }
    }
</script>