<template>
    <section class="slider">
        <div class="all-slides-wrap">
            <ul class="pgwSlider">
                <li v-for="banner in banners" style="width: 33%; display: none;">
                    <a :href="banner.url">
                        <img :src="banner.image">
                    </a>
                    <span v-if="banner.is_special">{{translate.actual}}</span>
                </li>
            </ul>
        </div>
    </section>
</template>

<script type="text/babel">
    import pgwSlider from  'pgwslider';
    //require('!style!css!pgwslider/pgwslider.min.css');
    export default {
        data(){
            return {

            }
        },
        props: ['banners', 'translate'],
        computed: {
            pgwSlider: function () {
                return $('.pgwSlider').pgwSlider({
                    displayControls: true
                })
            }
        },
        mounted () {
            this.pgwSlider.displaySlide(3)
            console.log(this.pgwSlider.displaySlide(3));
        }
    }
</script>