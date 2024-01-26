<template lang="">
	<div>
		<p>접근만료까지 {{store.acc_lim}}</p>
		<p>갱신만료까지 {{store.ref_lim}}</p>
		<button @click="refresh">갱신요청</button>
		<button @click="toBoard">보드가기</button>
		<router-view></router-view>
	</div>
</template>
<script setup>
import { useRouter } from 'vue-router';
import { inject, watch, provide, reactive } from 'vue';
import axios from 'axios';
import router from '../js/router';

const store = inject('store');

function refresh() {
	const url = '/api/auth';
	const header = {
		headers: {
			Authorization: 'Bearer ' + localStorage.getItem('access_token'), // <- 공백 넣어야 함
		},
	}
	axios.get(url, header)
		.then(res => {
			console.log(res.data);
			localStorage.setItem('access_token', res.data.access_token);

			// 현재 시간 - 만료기간 : 지나면 만료 / 안지나면 초로 출력
			const onlyTheTime = Temporal.Now.plainTimeISO()

			// (엑세스 토큰 / 리프레시 토큰(httpOnly라 실패)) -> 만료기간 출력
			const accSplit = res.data.access_token.split('.');
			const accPayload = JSON.parse(atob(accSplit[1]));

			const a = onlyTheTime.until(onlyTheTime.add({ seconds: accPayload.ttl}), {largestUnit: 'second'});
			const b = onlyTheTime.until(onlyTheTime.add({ seconds: 60}), {largestUnit: 'second'});

			store.acc_lim = a.seconds;
			store.ref_lim = b.seconds;

			// 타이머 설정
			const accDiscount = setInterval(() => {
				store.acc_lim === 0 ? clearInterval(accDiscount) : store.acc_lim--;
			}, 1000);
			const refDiscount = setInterval(() => {
				store.ref_lim === 0 ? clearInterval(refDiscount) : store.ref_lim--;
			}, 1000);

			store.ref_lim = 60;
		})
		.catch(err => {
			console.log(err.response);

			router.push('/login');
		})
		;
}

function toBoard() {
	router.push('/board');
}

</script>
<style lang="">
	
</style>