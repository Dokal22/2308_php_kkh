require('./bootstrap');

import {createApp} from 'vue';
import Epp from '../components/Epp.vue';

// createApp({ PLAN B
// 	components: {
// 		App,
// 	}
// })
createApp(Epp)
	.mount('#epp'); // id="app" 연결
