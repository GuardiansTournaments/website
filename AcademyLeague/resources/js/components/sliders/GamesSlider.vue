<template>
    <slick ref="slick" class="autoplay" :options="slickOptions" style="max-height:500px;">
        <img src="/images/test/achtergrond/rocketleague.png" alt="">
        <img src="/images/test/achtergrond/rocketleague.png" alt="">
        <img src="/images/test/achtergrond/rocketleague.png" alt="">
        <img src="/images/test/achtergrond/rocketleague.png" alt="">        
    </slick>
</template>

<script>
import Slick from 'vue-slick';
export default {
    components: {
        Slick
    },
    props: {
        images: Array,
    },
    data() {
        return {
            slickOptions: {
                slidesToShow: 2,
                slidesToScroll: 2,
                autoplay: false,
                autoplaySpeed: 2000,
                accessibility: false,
                arrows: false,
                centerMode: true,
                draggable: true,
                infinite: true,
                responsive: [
                    {
                        breakpoint: 1130,
                        settings: {
                            slidesToShow: 2,
                            centerMode: true,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            centerMode: true,
                        }

                    }
                ]
            },
        };
    },
    mounted() {
        console.log(this.images);
    }
}
</script>