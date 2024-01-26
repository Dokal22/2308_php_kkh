require('./bootstrap');

import { reactive, provide, createApp } from 'vue';
import router from './router'
// import store from '../js/store.js'

import AppComponent from '../components/AppComponent.vue';

const store = reactive({
	acc_lim: 0,
	ref_lim: 0,
});

const app = createApp({
	components: {
		AppComponent,
	},
})
	.provide('store', store)
	.use(router)
	// .use(store)
	.mount('#app');