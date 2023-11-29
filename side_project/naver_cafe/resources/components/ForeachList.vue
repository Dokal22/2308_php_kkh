<template lang="">
	<tr v-for="(item, i) in $store.state.list" :key="i"> 
		<td>{{item.id}}</td>
		<td id="title">
			<a href="/mini_board/src/detail.php/?id=$item[id] &page= $page_num">{{item.title}}</a>
		</td>
		<td>{{item.user_number}}</td>
		<td>{{item.created_at}}</td>
		<td>{{item.view}}</td>
		<td>{{item.like}}</td>
	</tr>
</template>
<script>
export default {
	name: 'ForeachList',
}
</script>
<style lang="">
	
</style>