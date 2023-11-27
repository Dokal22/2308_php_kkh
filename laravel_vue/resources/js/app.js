require('./bootstrap');

import {createApp} from 'vue';
import router from '../js/router.js'
import store from '../js/store.js'
import EppComponent from '../components/EppComponent.vue';
// import ConnectComponent from '../components/ConnectComponent.vue';

createApp({ // PLAN B
	components: {
		EppComponent,
		// ConnectComponent,
	}
})
// createApp(EppComponent)
	.use(router)
	.use(store)
 	.mount('#epp'); // id="app" 연결
