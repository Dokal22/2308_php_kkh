-- 




CREATE DATABASE MEMBER;
USE MEMBER; 하고 머시기 하면 여기 employees가 아니라 MEMBER 에서 작동하드라






;
COMMIT;


;
CREATE TABLE members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT
	,id VARCHAR(30) UNIQUE NOT NULL
	,mem_name VARCHAR(30) NOT NULL
	,addr VARCHAR(100) NOT NULL
);

CREATE TABLE points (
	mem_no INT PRIMARY KEY
	,pt INT NOT NULL DEFAULT (0)
-- 	,CONSTRAINT fk_points_mem_no FOREIGN KEY(mem_no)
-- 		REFERENCES members(mem_no) ON DELETE CASCADE
);

-- DROP TABLE employees.members;

CREATE TABLE items (
	item_no INT PRIMARY KEY AUTO_INCREMENT 
	,item_name VARCHAR(50) NOT NULL 
	,item_price INT NOT NULL DEFAULT(0)
);

CREATE TABLE orders (
	odr INT PRIMARY KEY AUTO_INCREMENT
	,mem_no INT NOT NULL 
	,item_no INT NOT NULL 
	,cnt INT NOT NULL 
	,total_pay INT NOT NULL 
	,CONSTRAINT fk_orders_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no)
	,CONSTRAINT fk_orders_item_no FOREIGN KEY(item_no)
		REFERENCES items(item_no) ON DELETE NO ACTION 
);

INSERT INTO members(id, mem_name, addr)
VALUES('admin', 'doribong', 'miguk, ohio'); -- 이거 오토인크리먼트한 애 값을 지정하면 에러)인데 마리아디비는 이랬다저랬다 작동 가능
INSERT INTO points(mem_no)
VALUES(1); -- 이거 이름으로 참조해올 수 잇나
