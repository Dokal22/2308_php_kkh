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

COMMIT;