import { createStore } from 'vuex';
// import axios from 'axios';

const store = createStore({
	state() {
		return {
			// test: 'test',
			list: [],
			id: null,
			page_limit: 15,
			page_bt_limit: 10,
			totalBoard: 0,
			board_type: null,
		}
	},
	mutations: {
		setList(state, data) {
			state.list = data;
		},
		setTotalBoard(state, data) {
			state.totalBoard = data;
		},
	},
	actions: {
		getList(context) {
			const url = '/api/boards';
			// const header = {
			// 	headers: {
			// 		'Authorization': 'Bearer meerkat'
			// 	}
			// };
			axios.get(url)// +headers // 400번대로 오면 자동catch?
				.then(res => {
					context.commit('setList', res.data);
					// console.log(res.data);
				})
				.catch(err => {
					console.log(err);
				})
		},
		getTotalBoard(context, board_type = "0"){
			const url = '/api/total/' + board_type;
			axios.get(url)// +headers // 400번대로 오면 자동catch?
				.then(res => {
					context.commit('setTotalBoard', res.data);
					// console.log(res.data);
				})
				.catch(err => {
					console.log(err.response);
				})
		}
	},
});

export default store;