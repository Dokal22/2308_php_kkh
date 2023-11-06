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
	'3'
	,'상담게시판'
)
-- ,(
-- 	'1'
-- 	,'질문게시판'
-- );
-- 
COMMIT;