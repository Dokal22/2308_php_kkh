<template lang="">
	<div>
      <h4 @click="$emit('modalOpen',item)">{{ item.name }}</h4>
      <p>{{ item.price }} 원</p>
      <button @click="$emit('plusOne',i)">신고</button>
      <span>신고수: {{ item.reportCnt }}</span>
    </div>
</template>
<script>
export default {
	name: 'Item',

	props: {
		products: Object,
		i: Number,
		item: Object,
	},

	method: {
		// Dachoong(){//이런 식으로 활용가능
		// 	this.$emit('modalOpen',this.item)
		// }
	}
}
</script>
<style lang="">
	
</style>