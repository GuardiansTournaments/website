<template>
    <slick ref="slick" class="autoplay" :options="slickOptions" style="max-height:500px;">
        <div class="col-lg-4">
            <div class="game-slider">
                <img src="https://cdn.discordapp.com/attachments/1082603510421528626/1145839300894789735/csgo.png?width=822&height=1056" style="width:100%; max-width:300px;" alt="">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="game-slider">
                <img src="https://cdn.discordapp.com/attachments/1082603510421528626/1145839301372948590/league.png?width=822&height=1056" style="width:100%; max-width:300px;" alt="">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="game-slider">
                <img src="https://cdn.discordapp.com/attachments/1082603510421528626/1145839301712679003/Rocket.png?width=822&height=1056" style="width:100%; max-width:300px;" alt="">
            </div>
        </div>
        <div class="col-lg-4">
            <div class="game-slider">
                <img src="https://cdn.discordapp.com/attachments/1082603510421528626/1145839302031450253/valorant.png?width=822&height=1056" style="width:100%; max-width:300px;" alt="">
            </div>
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
                slidesToShow: 4,
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

<style>
/* Add this CSS */
.game-slider {
    position: relative;
    overflow: hidden;
}

.game-slider img {
    transition: transform 0.3s ease;
}

.game-slider:hover img {
    transform: scale(1.1);
}
</style>
