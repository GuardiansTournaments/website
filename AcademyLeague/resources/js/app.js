/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
var $ = require('jquery');
window.$ = require('jquery');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('overlay-discord-connect', require('./components/OverlayDiscordConnect.vue').default);
Vue.component('generate-bracket', require('./components/GenerateBracket.vue').default);
Vue.component('tournament-create', require('./components/tournament/TournamentCreate.vue').default);
Vue.component('game-slider', require('./components/sliders/GamesSlider.vue').default);
Vue.component('info-slider', require('./components/sliders/InfoSlider.vue').default);
Vue.component('sponsor-slider', require('./components/sliders/SponsorSlider.vue').default);
Vue.component('user-edit', require('./components/user/UserEdit.vue').default);
Vue.component('arrow-bottom', require('./components/animations/ArrowBottom.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
