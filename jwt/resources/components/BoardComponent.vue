<template lang="">
	<div>
		<h1>보드</h1>
		<button @click="logout">로그아웃</button>
	</div>
</template>
<script setup>
import { useRouter } from 'vue-router';
import { inject, reactive, onMounted } from 'vue';
import axios from 'axios';
import router from '../js/router';

function getBoardInfo() {
	const url = '/api/boards';
	const header = {
		headers: {
			Authorization: 'Bearer ' + localStorage.getItem('access_token'), // <- 공백 넣어야 함
		},
	}
	axios.get(url, header)
		.then(res => {
			console.log(res.data.msg);
		})
		.catch(err => {
			console.log(err.response);

			router.push('/login');
		})
		;
}

function logout() {
	localStorage.clear();
	router.push('/login');
}

onMounted(() => {
	console.log(localStorage);
	if (!(localStorage.getItem('access_token'))) {
		router.push('/login');
	} else {
		getBoardInfo();
	}
});

</script>
<style lang="">
	
</style>