<template lang="">
	<form class="search_detail" action="/mini_board/src/list.php" method="post">
		<select name="create_at" id="">
			<option value="0">전체기간</option>
			<option value="DATE_FORMAT(NOW()- INTERVAL 1 DAY,'%Y%m%d')">1일</option>
			<option value="DATE_FORMAT(NOW()- INTERVAL 7 DAY,'%Y%m%d')">1주</option>
			<option value="DATE_FORMAT(NOW()- INTERVAL 1 MONTH,'%Y%m%d')">1개월</option>
			<option value="DATE_FORMAT(NOW()- INTERVAL 6 MONTH,'%Y%m%d')">6개월</option>
			<option value="DATE_FORMAT(NOW()- INTERVAL 1 YEAR,'%Y%m%d')">1년</option>
		</select>
		<select name="search_titcon" id="">
			<!-- <option value="">게시글+댓글</option>//titlecomments -->
			<option value="title">제목만</option>
			<option value="ip">글작성자</option>
			<!-- <option value="">댓글내용</option>//comments -->
			<!-- <option value="">댓글작성자</option>//ip_comments -->
		</select>
		<input type="text" name="search" id="search" placeholder="검색어를 입력해주세요">
		<button type="submit" class="search">검색</button>
	</form>  
</template>
<script>
export default {
	name: 'SearchComponents',
}
</script>
<style lang="">
	
</style>