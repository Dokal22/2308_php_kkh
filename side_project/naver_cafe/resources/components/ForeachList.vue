<template lang="">
	<tr v-for="(item) in $store.state.list" :key="item"> 
		<td>{{item.id}}</td>
		<td id="title">
			<a href="">{{item.title}}</a>
		</td>
		<td>{{item.user_name}}</td>
		<td>{{item.created_at}}</td>
		<td>{{item.view}}</td>
		<td>{{item.like}}</td>
	</tr>
	<!-- {{$route.params.page}} -->
</template>
<script>
export default {
	name: 'ForeachList',
	beforeUpdate() {
		this.toDate = new Date();
		this.toDate = new Date(this.toDate.getFullYear(),this.toDate.getMonth(),this.toDate.getDate());
		for (let i in this.$store.state.list) {
			this.date = new Date(this.$store.state.list[i].created_at);
			this.date = new Date(this.date.getFullYear(),this.date.getMonth(),this.date.getDate())
			if (this.toDate <= this.date) {
				this.$store.state.list[i].created_at 
				= this.$store.state.list[i].created_at
					.substring(11, 16)
			} else {
				this.$store.state.list[i].created_at 
				= this.$store.state.list[i].created_at
					.substring(0, 10)
					.replace("-", '.')
			}
		}
	},
	data() {
		return {
			date: null,
			toDate: null,
		}
	},
}
</script>
<style lang="">
	
</style>