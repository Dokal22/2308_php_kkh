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
			cafe_number: 1,
			listFlg: 0,
			nowPage: 1,
			start: 0,
			culc: 0,
			totalBtLimit: 0,
		}
	},
	mutations: {
		setList(state, data) {
			state.list = data;
		},
		setTotalBoard(state, data) {
			state.totalBoard = data;
		},
		setListFlg(state, data) {
			state.listFlg = data;
		},
		setNowPage(state, data) {
			state.nowPage = data;
		},
	},
	actions: {
		getList(context) {
			const url = '/api/boards/' 
				+ context.state.nowPage 
				+ context.state.page_bt_limit 
				+ context.state.page_limit;
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
		getTotalBoard(context, cafe_number, board_type = "0") {
			const url = '/api/total/' + cafe_number + '/' + board_type;
			axios.get(url)// +headers // 400번대로 오면 자동catch?
				.then(res => {
					context.commit('setTotalBoard', res.data);
					// console.log(res.data);
				})
				.catch(err => {
					console.log(err.response);
				})
		},
		getLogin(context, data) {
			const url = '/api/users';
			const headers = {
				"Content-Type": "application/json"
			};
			console.log(data);
			// console.log(JSON.stringify(data));
			axios.post(url, data)
				.then(res => {
					// context.commit('setTotalBoard', res.data);
					console.log(res.data);
				})
				.catch(err => {
					console.log(err.response);
				})
		},
	},
});

export default store;