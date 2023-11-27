import { createStore } from 'vuex';
// import axios from 'axios';

const store = createStore({
	state() {
		return {
			testStr: 'test',
			laravelData: null, // 라라벨에서 받은 데이터 저장용
		}
	},
	mutations: {
		// 초기 데이터 셋팅(라라벨에서 받은)
		setlaravelData(state, data){
			state.laravelData =data;
		},
	},
	actions: {

	},
});

export default store;