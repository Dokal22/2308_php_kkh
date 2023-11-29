require('./bootstrap');

import {createApp} from 'vue';
import AppComponents from '../components/AppComponents.vue';
import store from './store.js';
import router from './router.js'

createApp({
	components:{
		AppComponents,
	}
})
	.use(store)
	.use(router)
	.mount('#app');
