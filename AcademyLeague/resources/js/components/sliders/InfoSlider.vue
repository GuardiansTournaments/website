<template>
    <slick ref="slick" class="autoplay" :options="slickOptions" style="max-height:400px;">
        <!-- Tournaments -->
        <div class="col-lg-3 d-flex flex-column">
            <div class="text-center w-h1 mb-3">
                <i class="bi bi-trophy"></i>
            </div>
            <div class="d-flex justify-content-center">
                <div class="h5 bold text-center">Tournaments</div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center" style="width:250;">Join and play with friends.</div>
            </div>
        </div>

        <!-- Matchmaking -->
        <div class="col-lg-3 d-flex flex-column">
            <div class="text-center w-h1 mb-3">
                <i class="bi bi-search"></i>
            </div>
            <div class="d-flex justify-content-center">
                <div class="h5 bold text-center">Matchmaking</div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center" style="width:250;">Pre-game training matches.</div>
            </div>
        </div>

        <!-- Competition -->
        <div class="col-lg-3 d-flex flex-column">
            <div class="text-center w-h1 mb-3">
                <i class="bi bi-award"></i>
            </div>
            <div class="d-flex justify-content-center">
                <div class="h5 bold text-center">Competition</div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center" style="width:250;">Contest to be number one.</div>
            </div>
        </div>

        <!-- Community -->
        <div class="col-lg-3 d-flex flex-column">
            <div class="text-center w-h1 mb-3">
                <i class="bi bi-people"></i>
            </div>
            <div class="d-flex justify-content-center">
                <div class="h5 bold text-center">Community</div>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center" style="width:250;">Reach out to other players.</div>
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
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                            centerMode: false,
                        },
                    },
                    {
                        breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            centerMode: false,
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