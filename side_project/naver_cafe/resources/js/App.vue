<template>
	<div class="baggat">
		<Header/>
		<form class="search" method="post" action="/mini_board/src/list.php">
			<!-- <form class="search" method="post" action="search.php"> -->
			<input type="text" name="search" id="search">
			<button type="submit" class="search">검색</button>
		</form>
		<main>
			<Aside/>
			<div class="contents">
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
				<Section/>
				<div class="whspac"> 
					<Search/>
				</div> 
				<div class="super_ad">
					파워링크 광고입니다.
					<a href="">광고안내</a>
					<p></p>
					광고
				</div>
			</div>  
		</main>
		<Footer/>
	</div>
</template>

<script>
	import Header from '../components/Header.vue';
	import Aside from '../components/Aside.vue';
	import Footer from '../components/Footer.vue';
	import Search from '../components/Search.vue';
	import Section from '../components/Section.vue';
	import ForeachList from '../components/ForeachList.vue';

	export default {
		name: 'App',
		components: {
			Header,
			Aside,
			Footer,
			Search,
			Section,
			ForeachList,
		}
	}
</script>

<style>
	@import url('../css/app.css');
</style>