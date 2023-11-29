import { createStore } from 'vuex';
// import axios from 'axios';

const store = createStore({
	state() {
		return {
			// test: 'test',
			list: [],
		}
	},
	mutations: { 
		getList(state, data){
			state.list = data;
		}
	},
	actions: { 
		getList(context){
			const url = '/api/boards';
			// const header = {
			// 	headers: {
			// 		'Authorization': 'Bearer meerkat'
			// 	}
			// };
			axios.get(url)// +headers // 400번대로 오면 자동catch?
				.then(res => {
					context.commit('getList', res.data);
					console.log(res.data);
				})
				.catch(err => {
					console.log(err);
				})
		},
	},
});

export default store;