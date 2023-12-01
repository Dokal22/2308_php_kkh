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
				@click="chgNowPage(i+1)"
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
	<p>page_bt_limit: {{$store.state.page_limit}}</p>
	<p>culc: {{$store.state.culc}}</p>
	<p>start: {{$store.state.start}}</p>
	<p>totalBtLimit: {{$store.state.totalBtLimit}}</p>
</template>
<script>
export default {
	name: 'SectionComponents',
	data() {
		return {
			// start: 0,
			// culc: 0,
			// totalBtLimit: 0,
		}
	},
	created() {
		this.$store.state.culc = (Math.ceil(this.$store.state.nowPage / this.$store.state.page_bt_limit)) * this.$store.state.page_bt_limit;
		this.$store.state.start = this.$store.state.culc - (this.$store.state.page_bt_limit - 1);
		this.$store.state.totalBtLimit = (this.$store.state.totalBoard / this.$store.state.page_limit) * this.$store.state.page_bt_limit;
	},
	methods: {
		chgNowPage(i) {
			this.$store.commit('setNowPage', i);
		}
	},
}
</script>
<style lang="">
	
</style>