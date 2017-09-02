<template>
    <section class="slider">
        <div class="all-slides-wrap">
            <ul class="pgwSlider">
                <li v-for="banner in banners"><img :src="banner.image" alt=""><span v-if="banner.is_special">Спецпредложение</span></li>
            </ul>
        </div>


    </section>
</template>

<script type="text/babel">
    import pgwSlider from  'pgwslider';
    require('!style!css!pgwslider/pgwslider.min.css');
    export default {
        data(){
            return {

            }
        },
        props: ['banners'],
        mounted(){
            $('.pgwSlider').pgwSlider();
        }
    }
</script>