-- 업데이트 set 컬럼=값,컬럼=값,컬럼=값
-- 웨어조건 무조건



INSERT INTO employees (
	emp_no
	,birth_date
	,FIRST_name
	,LAST_name
	,gender
	,hire_date
)
VALUES (
	500001
	,20020329
	,'gneenart'
	,'haakwon'
	,'M'
	,20021222
);

SELECT * FROM salaries WHERE emp_no = 500000;


UPDATE titles
SET 
	title = 'CEO'
WHERE emp_no = 500000;

-- 그놈 직급 스태프로

UPDATE titles
SET 
	title = 'Staff'
WHERE emp_no = 500000;

UPDATE salaries
SET
	salary = salary + 1
WHERE emp_no = 500000;

