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

DROP TABLE board;

ALTER TABLE boards ADD favorate INT NOt NULL DEFAULT '0';
ALTER TABLE boards DROP COLUMN view_cnt;
COMMIT;