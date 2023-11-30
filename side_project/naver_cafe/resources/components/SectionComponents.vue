<template lang="">
	<section>
		<div class="page_buts">
			<a 
				v-if="true" 
				class="page-btn" 
				href="/mini_board/src/list.php/?page=<?php echo $prev_page_num ?>"
			>
				<div class="arrow_L"/>
				<span>이전</span>
			</a>
			<div class="sero"/>
			<!-- 
            $culc=((ceil($route.params.page/$store.state.page_limit))*$store.state.page_limit);
            let i=$culc-($store.state.page_limit-1);
                    for($i;$i<=$culc;$i++){
                        if($i>$max_page_num){   
                        break;}
                        if($i==$page_num){
        	-->
			<a 
				v-for="(item,i) in $store.state.page_bt_limit" :key="i"
				class="page-btn" 
				id="page-btn" 
				:href="`/${i+1}`"
			>{{i+1}}</a>

			<div class="sero"/>
			<!--  if($culc<$max_page_num){  -->
			<a 
				v-if="true"
				class="page-btn" 
				href="/mini_board/src/list.php/?page=<?php echo $next_page_num ?>"
			>
				<span>다음</span>
				<div class="arrow_R"/>
			</a>
		</div>  

	</section>
	<p>page: {{$route.params.page}}</p>
	<p>page_bt_limit: {{$store.state.page_limit}}</p>
	<p>culc: {{culc}}</p>
	<p>start: {{start}}</p>
	<p>totalBtLimit: {{totalBtLimit}}</p>
</template>
<script>
export default {
	name: 'SectionComponents',
	data() {
		return {
			start: 0,
			culc: 0,
			totalBtLimit: 0,
		}
	},
	beforeUpdate() {
		this.culc = (Math.ceil(this.$route.params.page / this.$store.state.page_bt_limit)) * this.$store.state.page_bt_limit;
		this.start = this.culc - (this.$store.state.page_bt_limit - 1);
		this.totalBtLimit = this.$store.state.totalBoard / this.$store.state.page_limit;
	},
}
</script>
<style lang="">
	
</style>