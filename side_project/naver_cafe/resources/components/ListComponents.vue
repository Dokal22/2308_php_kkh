<template lang="">
	<h3>자유게시판</h3>
	<a href="" class="favorate">★</a>
	<form class="sort" method="post" action="list.php">
		<a href="" class="sort_a">새글 구독</a>
		<div class="slider"></div>
		<!-- <input type="range" id="gudok" name="gudok" min="0" max="1" step="1" style="width:25px;"> -->
		<a href="" class="sort_a">□ 공지 숨기기</a>
		<div class="sero"></div>
		<a href="" class="sort_a">▤</a>
		<a href="" class="sort_a">▦</a>
		<a href="" class="sort_a">📄</a>
		<select name="gaeshick" id="gaeshick">
			<button type="submit" value="" class="gaeshick"><option value="5">5개씩</option></button>
			<button type="submit" value="" class="gaeshick"><option value="10">10개씩</option></button>
			<option value="15"><button type="submit" value="" class="gaeshick">15개씩</button></option>
			<option value="20"><button type="submit" value="" class="gaeshick">20개씩</button></option>
			<option value="30"><button type="submit" value="" class="gaeshick">30개씩</button></option>
			<option value="40"><button type="submit" value="" class="gaeshick">40개씩</button></option>
			<option value="50"><button type="submit" value="" class="gaeshick">50개씩</button></option>
		</select>
	</form>
	<table>
		<colgroup>
			<col width=10%>
			<col width=49%>
			<col width=13%>
			<col width=12%>
			<col width=8%>
			<col width=8%>
		</colgroup>
		<tr class="table-title">
			<th>번호</th>
			<th>제목</th>
			<th>작성자</th>
			<th>작성일자</th>
			<th>조회</th>
			<th>좋아요</th>
		</tr>
		<ForeachList/>
	</table>
	<a href="/mini_board/src/insert.php" id="insert" class="jagseong"><div class="pen">✏</div>글쓰기</a>

	<SectionComponents />
</template>
<script>
import ForeachList from './ForeachList.vue';
import SectionComponents from './main/SectionComponents.vue';

export default {
	name: 'ListComponents',
	updated() {
		this.$store.dispatch('getList')
	},
	components: {
		ForeachList,
		SectionComponents,
	},
}
</script>
<style lang="">
	
</style>