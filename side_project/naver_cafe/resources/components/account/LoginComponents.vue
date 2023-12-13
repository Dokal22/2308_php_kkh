<template lang="">
	<div>
		아이디
		<input 
			v-model.trim="user_id" 
			type="text"
		>
		비번
		<input 
			v-model.trim="user_pw" 
			type="password"
		>
		<a @click="login()">로그인</a>
		<router-link to="/regist">회원가입</router-link>
		<router-link to="/">뒤로</router-link>
	</div>
</template>
<script>
export default {
	name: 'LoginComponents',
	data() {
		return {
			user_id: '',
			user_pw: '',
		}
	},
	methods: {
		login() {
			const frmData = {
				user_id: this.user_id,
				user_pw: this.user_pw,
			};
			this.$store.dispatch('getLogin', frmData)
		}
	},
}
</script>
<style lang="">
	
</style>