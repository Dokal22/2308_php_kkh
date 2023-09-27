-- 1. 짝궁 인적사항
INSERT INTO employees(
	emp_no, birth_date, first_name, last_name, gender, hire_date, sup_no
)
VALUES(
	500009, 19930921, "수진", "양", "F", 20230817, null
)
;

-- 2. 월급삽입
INSERT INTO salaries(
	emp_no, salary, from_date, to_date
)
VALUES(
	500009, 1538, 20230817, 99990101
)
;

-- 3. Sachin -> F, 19700101
UPDATE employees
SET gender = "F"
	,birth_date = 19700101
WHERE first_name = "Sachin"
;
SELECT *
FROM employees
WHERE first_name = "Sachin"
;

-- 4. 짝궁 삭제
DELETE FROM employees
WHERE emp_no = 500009;