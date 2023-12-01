<template lang="">
	<div class="detail_con">
		<div>
			<div>
				<a>자유게시판 ></a>
				<br>
				<h3>제목</h3>   
			</div>
			<div>
				<a class="profile_detail"></a>
				<div class="after_profile_detail">
					<div>
						<span>작성자</span> 
						<span>등급</span>
						<a>+ 구독</a>
						<a>1:1 채팅</a>
					</div>
					<div>
						<span>작성일</span>
						<span>조회</span>
					</div>
					<div>

					</div>
				</div>
			</div>
			<p>내용</p>
		</div>
		<div>
			<a href="/mini_board/src/update.php/?id=<?php echo $id; ?>&page=<?php echo $page_num; ?>">수정</a>
			<a href="/mini_board/src/list.php/?page=<?php echo $page_num; ?>">목록</a>
			<a href="/mini_board/src/delete.php/?page=<?php echo $page_num; ?>&id=<?php echo $id; ?>">삭제</a>
		</div>
	</div>
</template>
<script>
export default {
	name: 'DetailComponents',
}
</script>
<style lang="">
	
</style>