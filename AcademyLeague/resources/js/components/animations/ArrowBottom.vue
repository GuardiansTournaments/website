<template>
    <div class="arrow">
        <span></span>
        <span></span>
        <span></span>
    </div>
</template>

<script>
export default {
    components: {
    },
    props: {
    },
    data() {
        return {

        };
    },
    mounted() {
        // Get the arrow element
        const arrow = document.querySelector('.arrow');

        // Add a class to make the arrow clickable
        arrow.classList.add('clickable');

        // Add a click event listener to the arrow
        arrow.addEventListener('click', () => {
            // Scroll down by 1000px when the arrow is clicked
            window.scrollBy(0, 850);
            // Do not fade out the arrow
        });
    }
}
</script>