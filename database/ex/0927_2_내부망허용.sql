SELECT b_no, title, contents, b_date FROM board WHERE b_no = 1;

USE mysql;
SELECT * FROM USER;

CREATE USER 'team5'@'192.168.0.%' IDENTIFIED BY 'team5';
GRANT ALL PRIVILEGES ON *.* TO 'team5'@'192.168.0.%' IDENTIFIED BY 'team5';

COMMIT;
FLUSH PRIVILEGES;

DELETE FROM user WHERE HOST = '192.168.0.*';