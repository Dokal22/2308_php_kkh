<template>
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
				<router-view />
				{{ $store.state.totalBoard }}
				<SectionComponents />
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
import HeaderComponents from './HeaderComponents.vue';
import AsideComponents from './AsideComponents.vue';
import FooterComponents from './FooterComponents.vue';
import SearchComponents from './SearchComponents.vue';
import SectionComponents from './SectionComponents.vue';

export default {
	name: 'AppComponents',
	beforeCreate() {
		this.$store.dispatch('getTotalBoard');//this.$store.state.board_type
	},
	components: {
		HeaderComponents,
		AsideComponents,
		FooterComponents,
		SearchComponents,
		SectionComponents,
	}
}
</script>

<style>
@import url('../css/app.css');
</style>