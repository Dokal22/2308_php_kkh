import { createStore } from 'vuex';
import axios from 'axios';

const store = createStore({
	state() {// 데이터를 저장하는 영역
		return {
			boardData: [],// 게시글 저장용
			flgTapUI: 0, // 탭ui용 플래그
			imgURL: '', // 작성탭 표시용 이미지 URL 저장용
			postFileData: null, // 글작성용 파일데이터 저장용
			lastBoardId: 0, // 가장 마지막 로드 된 게시글 번호 저장용
			PushFlg: true, // 더보기 플래그
		}
	},
	mutations: { // 데이터 수정용 함수 저장 영역
		// state는 자동 세팅되어 옴(문법)
		setBoardList(state, data) {
			state.boardData = data;
			state.lastBoardId = data[data.length - 1].id; 
			// 원래 여기도 commit 호출해서
			// 작업 하나 당 한 mutation으로 분리해놓고 쓰는걸 추천
		},
		// flgTapUI 세팅용
		setFlgTabUI(state, num) {
			state.flgTapUI = num;
		},
		// imgURL 세팅용
		setImgURL(state, url) {
			state.imgURL = url;
		},
		// postFileData 세팅용
		setPostFileData(state, file) {
			state.postFileData = file;
		},
		// 작성된 글 삽입용
		setUnshiftBoard(state, data) {
			state.boardData.unshift(data);
		},
		// 더보기
		setPushBoard(state, data) {
			if(typeof data.id !== 'undefined'){ 
				// ^ 그냥 data일 때는 왜 안걸리지
				state.boardData.push(data);
				state.lastBoardId = state.boardData[state.boardData.length - 1].id;	
			} else {
				alert('끗');
				state.PushFlg = false;
			}
		},
		// 작성후 초기화 처리
		setClearAddData(state) {
			state.imgURL = '';
			state.postFileData = null;
		}
	},
	actions: { // 비동기 또는 ajax용 함수 정의 영역
		// 초기 게시글 데이터 획득 ajax처리
		actionGetBoardList(context) { // context문법 (store 호출 => .state || .commit(mutation))
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			axios.get(url, header) // 400번대로 오면 자동catch?
				.then(res => {
					console.log(res.status);
					console.log(res.data);
					context.commit('setBoardList', res.data);
				})
				.catch(err => {
					console.log(err);
				})
		},
		// 글 작성 처리
		actionPostBoardAdd(context) {
			const url = 'http://112.222.157.156:6006/api/boards';
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat',
					'Content-Type': 'multipart/form-data',
				}
			};
			const data = {
				name: '관호',
				img: context.state.postFileData,
				content: document.getElementById('content').value,
			};
			axios.post(url, data, header)
				.then(res => { // 자동 json이기 때문에 우리가 원하는거 res.data에 있음
					// 작성글 데이터 셋팅
					context.commit('setUnshiftBoard', res.data);
					//listUI로 전환
					context.commit('setFlgTabUI', 0);
					// 초기화
					context.commit('setClearAddData');
				})
				.catch(err => {
					console.log(err);
				})
		},
		actionOneMoreGetBoard(context) { // context문법 (store 호출 => .state || .commit(mutation))
			const url = 'http://112.222.157.156:6006/api/boards/' + context.state.lastBoardId;
			const header = {
				headers: {
					'Authorization': 'Bearer meerkat'
				}
			};
			axios.get(url, header) // 400번대로 오면 자동catch?
				.then(res => {
					// 쌤은 마지막 게시물 분기를 여기다 함
					// if(res.data) => 게시
					// else => 버튼flg false
					context.commit('setPushBoard', res.data);
					// 원래 여기서 작업이 2개면 commit이 두개 (추천)
				})
				.catch(err => {
					// console.log(err);
					console.log(err.response.data);
				})
		},
	},
});

export default store;