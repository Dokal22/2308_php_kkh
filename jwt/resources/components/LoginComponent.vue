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
import { useRouter } from 'vue-router';
import { reactive } from 'vue';
import axios from 'axios';

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