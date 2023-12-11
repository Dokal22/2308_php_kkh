-- 데이터베이스 생성
CREATE DATABASE midium_board;

-- 테이블 생성
CREATE TABLE board (
	id INT PRIMARY KEY AUTO_INCREMENT 
	,title VARCHAR(50) NOT NULL 
	,contents VARCHAR(1000) NOT NULL
	,created_at DATETIME NOT null
	,modified_at DATETIME
	,delete_at DATETIME 
	);
	
-- 컬럼 추가
ALTER TABLE board ADD COLUMN deleted_at DATETIME;
	
-- 테이블 수정하기
ALTER board MODIFY COLUMN delete_at DATETIME; 

-- 테이블 삭제
DROP TABLE board;
ALTER table board DROP COLUMN delete_at;

-- 이 밑은 테스트
-- 보기
	-- 딜리트 값이 없는 친구들
	SELECT * FROM board 
	WHERE delete_at IS NULL;

-- 입력하기
-- 값 생성
INSERT INTO board (
	title
	,contents
	,created_at
) VALUES (
	'제목'
	,'내용'
	,NOW()
);

-- 수정하기
UPDATE board
SET 
	delete_at = NULL
WHERE 
	id = 1;
	
-- 없애기
DELETE FROM board
WHERE id = 0;

COMMIT;
ROLLBACK;