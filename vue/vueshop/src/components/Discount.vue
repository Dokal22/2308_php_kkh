<template>
	<!-- 할인 -->
	<div class="discount">
		<p>싸다싸 {{ discountNum }}%</p>
	</div>
</template>
<script>
export default {
	name: 'Discount',

	data() {
		return {
			discountNum: 30,
			saleTime: null,
		}
	},

	mounted() { // 라이프 사이클 훅->mounted단계에서 실행
		this.saleTime = setInterval(() => {
			this.discountNum--;
		}, 100);
	},

	updated() {
		if(this.discountNum<=10){
			clearInterval(this.saleTime);
		}
	},
}
</script>
<style></style>