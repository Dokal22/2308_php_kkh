CREATE DATABASE mini_multi_board;

USE mini_multi_board;

CREATE TABLE USER(
	id INT PRIMARY KEY AUTO_INCREMENT 
	,u_id VARCHAR(20) NOT NULL 
	,u_pw VARCHAR(256) NOT NULL 
	,u_name VARCHAR(50) NOT NULL 
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() -- 통계낼라고 시간도 구한다드라
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME 
);

CREATE TABLE board(
	id INT PRIMARY KEY AUTO_INCREMENT 
	,u_pk INT NOT NULL 
	,b_type CHAR(1) NOT NULL 
	,b_title VARCHAR(30) NOT NULL 
	,content VARCHAR(1000) NOT NULL 
	,b_img VARCHAR(50)
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() -- 통계낼라고 시간도 구한다드라
	,updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,deleted_at DATETIME 
);

CREATE TABLE boardname(
	id INT PRIMARY KEY AUTO_INCREMENT 
	,b_type CHAR(1) NOT NULL 
	,b_name VARCHAR(15) NOT NULL 
);

-- user insert
INSERT INTO user(
	u_id
	,u_pw
	,u_name
)
VALUES (
	'admin'
	,'MTIzNDU2Nzg=' -- 12345678이 이거라니,,
	,'관리자'
)
,(
	'user1'
	,'MTIzNDU2Nzg=' -- 12345678이 이거라니,,
	,'유저1'
);

-- board table insert
INSERT INTO board(
	u_pk 
	,b_type
	,b_title 
	,content 
)
VALUES (
	'1'
	,'0'
	,'관리자글'
	,'관리자글'
)
,(
	'2'
	,'1'
	,'유저글'
	,'유저글'
)
,(
	'2'
	,'1'
	,'유저글2'
	,'유저글2'
);

-- boardname table insert
INSERT INTO boardname(
	b_type
	,b_name
)
VALUES (
	'0'
	,'자유게시판'
)
,(
	'1'
	,'질문게시판'
);

COMMIT;