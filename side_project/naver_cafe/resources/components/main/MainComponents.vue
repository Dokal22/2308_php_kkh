<template lang="">
	<!-- 카페 -->
	<div class="baggat">
		<HeaderComponents />
		<form class="search" method="post" action="/mini_board/src/list.php">
			<!-- <form class="search" method="post" action="search.php"> -->
			<input type="text" name="search" id="search">
			<button type="submit" class="search">검색</button>
		</form>
		<main>
			<AsideComponents />
			<div class="contents">
				<ListComponents v-if="$store.state.listFlg === 0"/>
				<DetailComponents v-else/>
				{{ $store.state.totalBoard }}
				<div class="whspac">
					<SearchComponents />
				</div>
				<div class="super_ad">
					파워링크 광고입니다.
					<a href="">광고안내</a>
					<p></p>
					광고
				</div>
			</div>
		</main>
		<FooterComponents />
	</div>
</template>
<script>
import AsideComponents from './AsideComponents.vue';
import FooterComponents from './FooterComponents.vue';
import ForeachList from '../ForeachList.vue';
import HeaderComponents from './HeaderComponents.vue';
import ListComponents from '../ListComponents.vue';
import SearchComponents from './SearchComponents.vue';
import DetailComponents from '../DetailComponents.vue';

export default {
	name: 'MainComponents',
	components: {
		AsideComponents,
		FooterComponents,
		HeaderComponents,
		SearchComponents,
		ListComponents,
		ForeachList,
		DetailComponents,
	},
	beforeCreate() {
		this.$store.dispatch('getTotalBoard', this.$store.state.cafe_number);//this.$store.state.board_type
	},
}
</script>
<style lang="">
	
</style>