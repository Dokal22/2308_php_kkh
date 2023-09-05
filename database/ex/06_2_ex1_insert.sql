-- INSERT 
-- INSERT INTO 테이블명 [( 속성1, 속성2)]
-- VALUES (속성값1, 속성값2)

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
COMMIT;

-- 오십만번 사원 급여데이터 삽입
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,63810
	,20020330
	,99990101
);

SELECT MAX(salary)OM salaries;
SELECT * FROM salaries WHERE emp_no = 500000;
SELECT * FROM dept_emp WHERE emp_no = 500000;

-- 신입 소속부서 삽입

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d003'
	,20020330
	,99990101
);


INSERT INTO titles
VALUES (
	500000
	,'Staff'
	,20020330
	,99990101
);
	