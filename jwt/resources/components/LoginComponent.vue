<template lang="">
	<div>
		<input type="text" name="u_id" id="u_id" v-model="state.u_id">
		<br>
		<input type="text" name="u_pw" id="u_pw" v-model="state.u_pw">
		<br>
		<button @click="login">로그인</button>
	</div>
</template>
<script setup>
import { Temporal, Intl, toTemporalInstant } from '@js-temporal/polyfill';
import { useRouter } from 'vue-router';
import { inject, reactive } from 'vue';
import axios from 'axios';

const store = inject('store');

const router = useRouter(); // "useRoute"r 오타
const state = reactive({
	u_id: '',
	u_pw: '',
});

function login() {
	const url = '/api/auth/login';
	const formData = new FormData();
	formData.append('u_id', state.u_id);
	formData.append('u_pw', state.u_pw);
	const header = {
		headers: {
			'Content-type': 'multipart/form-data',
		}
	}

	axios.post(url, formData, header)
		.then(res => {
			// console.log(res);
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

			router.push('/board');
		})
		.catch(err => {
			console.log(err.response);
		})
		;
}

</script>
<style lang="">
	
</style>