<template>
    <section class="slider">
        <div class="all-slides-wrap">
            <ul class="pgwSlider">
                <li v-for="banner in banners">
                    <a :href="banner.url">
                        <img :src="banner.image" alt="">
                    </a>
                    <span v-if="banner.is_special">{{translate.actual}}</span>
                </li>
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
        props: ['banners', 'translate'],
        mounted(){
            $('.pgwSlider').pgwSlider();
        }
    }
</script>