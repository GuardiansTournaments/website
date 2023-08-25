<template>
    <slick ref="slick" class="autoplay" :options="slickOptions" style="max-height:200px;">
        <div v-for="item in this.images" v-bind:key="item.id" class="m-5">
            <img :src="item.image" width="150" alt="Card image" class="corners p-0 m-0"
                style="object-fit: contain;">
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
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
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