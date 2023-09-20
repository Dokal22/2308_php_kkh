CREATE DATABASE mini_board;

USE mini_board; -- 옆창에서 클릭하는 거랑 같음

CREATE TABLE boards(
	id INT PRIMARY KEY AUTO_INCREMENT 
	,title VARCHAR(100) NOT NULL 
	,content VARCHAR(1000) NOT NULL 
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
	,delete_flg CHAR(1) NOT NULL DEFAULT '0' -- int보다 char가 더 빠르다?
	,delete_at DATETIME DEFAULT NULL 
);

-- DROP TABLE boards;

INSERT INTO boards(
	title
	,content
)
VALUES
('제목1','내용1')
,('제목2','내용2')
,('제목3','내용3')
,('제목4','내용4')
,('제목5','내용5')
,('제목6','내용6')
,('제목7','내용7')
,('제목8','내용8')
,('제목9','내용9')
,('제목10','내용10')
,('제목11','내용11')
,('제목12','내용12')
,('제목13','내용13')
,('제목14','내용14')
,('제목15','내용15')
,('제목16','내용16')
,('제목17','내용17')
,('제목18','내용18')
,('제목19','내용19')
,('제목20','내용20')
,('제목21','내용21')
,('제목22','내용22')
,('제목23','내용23')
,('제목24','내용24')
,('제목25','내용25')
,('제목26','내용26')
,('제목27','내용27');