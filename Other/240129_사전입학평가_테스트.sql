-- 1
CREATE DATABASE pre_adm_eval;

USE pre_adm_eval;

CREATE TABLE users(
	userid INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(30) NOT NULL,
	authflg CHAR(1) DEFAULT '0',
	birthday DATE NOT NULL,
	createdat DATETIME DEFAULT NOW()
);

-- 2
INSERT INTO users(
	username,
	authflg,
	birthday
) VALUES (
	'그린',
	'0',
	'2024-01-26'
);

-- 3
UPDATE users
SET 
	username = '테스터',
	authflg = '1',
	birthday = '2007-03-01'
WHERE username = '그린';

-- 4
DELETE FROM users
WHERE username = '테스터';

-- 5
ALTER table users ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';

-- 6
-- DROP DATABASE pre_adm_eval;

-- 7
CREATE TABLE rankmanagement(
	rankid INT,
	userid INT,
	rankname VARCHAR(30) NOT NULL,
	PRIMARY KEY(rankid),
	FOREIGN KEY(userid) REFERENCES users(userid)
);

INSERT INTO rankmanagement(
	rankid,
	userid,
	rankname
) VALUES (
	1,
	(SELECT userid FROM users WHERE username = '테스터'),
	'manager'
);

SELECT
	username,
	birthday,
	rankname
FROM users AS u
	JOIN rankmanagement AS r
	  ON r.userid = u.userid;
	  
-- 8
DELIMITER //
CREATE PROCEDURE nineninedan()
BEGIN 
	DECLARE i INT DEFAULT 1;
	WHILE (i <= 9) DO
		SELECT CONCAT('2 x ',i,' = ',i*2);
-- 		SELECT 1;
		SET i = i + 1;
	END WHILE;
END 

//

DELIMITER ;


call nineninedan();

DROP PROCEDURE nineninedan;