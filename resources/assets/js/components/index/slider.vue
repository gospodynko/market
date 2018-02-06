<template>
    <section class="slider">
        <div class="all-slides-wrap">
            <ul class="pgwSlider">
                <div class="btn-prev-all-slider-480">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M0,22L22,0l2.1,2.1L4.2,22l19.9,19.9L22,44L0,22L0,22L0,22z" fill="#14c44d"></path></svg>
                </div>
                <li v-for="banner in banners">
                    <a :href="banner.url">
                        <img :src="banner.image" alt="">
                    </a>
                    <span v-if="banner.is_special">{{translate.actual}}</span>
                </li>
                <div class="btn-next-all-slider-480">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 27 44"><path d="M27,22L27,22L5,44l-2.1-2.1L22.8,22L2.9,2.1L5,0L27,22L27,22z" fill="#14c44d"></path></svg>
                </div>
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