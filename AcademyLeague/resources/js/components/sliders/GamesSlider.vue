<template>
    <slick ref="slick" class="autoplay" :options="slickOptions" style="max-height:400px;">

        <div class="position-relative game-slide">
            <img src="/images/test/achtergrond/rocketleague.png" class="" style="max-width:325px; width:100%;" alt="">
            <img src="/images/test/gameitems/rocketleague.png" class="position-absolute"
                style="top:0; left:0; max-width:326px; width:100%;" alt="">
        </div>


        <div class="position-relative game-slide">
            <img src="/images/test/achtergrond/csgo.png" class="" style="max-width:325px; width:100%;" alt="">
            <img src="/images/test/gameitems/csgo.png" class="position-absolute" style="top:0; left:0; max-width:326px; width:100%;"
                alt="">
        </div>


        <div class="position-relative game-slide">
            <img src="/images/test/achtergrond/league.png" class="" style="max-width:325px; width:100%;" alt="">
            <img src="/images/test/gameitems/league.png" class="position-absolute" style="top:0; left:0; max-width:326px; width:100%;"
                alt="">
        </div>

        <div class="position-relative game-slide">
            <img src="/images/test/achtergrond/valorant.png" class="" style="max-width:325px; width:100%;" alt="">
            <img src="/images/test/gameitems/valorant.png" class="position-absolute" style="top:0; left:0; max-width:326px; width:100%;"
                alt="">
        </div>

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
                slidesToShow: 3,
                slidesToScroll: 3,
                autoplay: true,
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