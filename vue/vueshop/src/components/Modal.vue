<template lang="">
	<div class="bg_black">
      <div class="bg_white">
        <img :src="modalProduct.img" alt="이미지">
        <h4>상품명: {{modalProduct.name}}</h4>
        <p>상품 설명: {{modalProduct.content}}</p>
        <p>가격: {{modalProduct.price}}원</p>
		<input 
			type="text" 
			v-model="productCnt"
		>
		<p>총 가격: {{productCnt * modalProduct.price}}원</p>
		<!-- @change = @input -->
        <p>신고수: {{modalProduct.reportCnt}}</p>
        <button @click="$emit('modalClose')">닫기</button>
      </div>
    </div>
</template>
<script>
export default {
	name: 'Modal',

	data() {
		return {
			productCnt: 0,
			totalPrice: 0,
		}
	},

	watch: { // data를 감시하는 함수를 정의하는 영역
		// 함수명은 감시하고 싶은 데이터 바인딩명과 동일해야함
		productCnt(input) {
			if (0>input.indexOf('0','1','2','3','4','5','6','7','8','9','10')) {
				alert('문자 뭐여');
				this.productCnt = 0;
			} else if (input < 0) {
				alert('얹뒈!');
				this.productCnt = 0;
			} else if (input > 10) {
				alert('않되!');
				this.productCnt = 10;
			}
		},
	},

	props: {
		modalProduct: Object,
	},

	method: {

	},
}
</script>
<style lang="">
	
</style>