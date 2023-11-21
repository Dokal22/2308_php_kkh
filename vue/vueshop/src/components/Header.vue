<template>
	<div class="nav">
		<a v-for="item in Usan" :key="item">{{ item }}</a>
	</div>
</template>
<script>
export default {
	name: 'Header',

	// props: 상위 컴포넌트데이터 받아오기
	props: {
		Usan: Array,
	}
}
</script>
<style>
	
</style>