<template>
	<div>
		EppComponent
		<ul>
			<li>{{ $store.state.testStr }}</li>
			<li>{{ $store.state.laravelData }}</li>
			<li>{{ laravelData.name }}</li>
			<li>{{ laravelData.id }}</li>
			<li><a href="/">root</a></li> <!-- laravel router -->
			<li><a href="/login">login</a></li>
			<li><a href="/board">board</a></li>
			<li><router-link to="/login">라우터 login</router-link> <!-- vue router 서버요청X --></li>
			<li><router-link to="/board">라우터 board</router-link></li>
		</ul>

		
		<router-view></router-view>
	</div>
</template>
<script>
export default {
	name: 'EppComponent',
	props: {
		laravelData: Object, // 배열로 보내서 json => 객체로 씀
	},
	beforeCreate(){
		this.$store.commit('setlaravelData',this.laravelData);
	},
}
</script>
<style>
	
</style>