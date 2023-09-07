INSERT INTO employees (
	emp_no
	,birth_date
	,FIRST_name
	,LAST_name
	,gender
	,hire_date
)
VALUES (
	500002
	,20020329
	,'김'
	,'관호'
	,'M'
	,20230817
);
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date	
)
VALUES (
	500002
	,77234
	,20230817
	,99990101
);

ALTER TABLE dept_manager DROP CONSTRAINT dept_manager_ibfk_2;

INSERT INTO titles(
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Staff'
	,20230817
	,99990101
);

INSERT INTO dept_emp(
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d001'
	,20230817
	,99990101
);


UPDATE dept_emp
SET dept_no = 'd009'
WHERE emp_no = 500002;

UPDATE dept_emp
SET from_date = 20230907
WHERE emp_no = 500002;


UPDATE employees
SET emp_no = 500002
WHERE emp_no = 500001;

DELETE from employees
WHERE emp_no = 500001;

COMMIT;

UPDATE dept_manager 
set to_date = 20230907
where emp_no = 111939;

INSERT INTO dept_manager (
	dept_no
	,emp_no
	,from_date
	,to_date
)
VALUES (
	'd009'
	,500002
	,20230907
	,99990101
)
;
UPDATE titles
SET title = 'Senior Engineer'
WHERE emp_no = 500002;

UPDATE titles
SET from_date = 20230907
WHERE emp_no = 500002;


SELECT e.emp_no, e.last_name, s.salary
FROM employees e
	JOIN salaries s
		ON s.emp_no = e.emp_no
WHERE salary = (
		select MAX(salary)
		FROM salaries
		)
		OR 
		salary = (
		select MIN(salary)
		FROM salaries
		)
;

SELECT e.emp_no, e.last_name, s.salary
FROM employees e
	JOIN salaries s
		ON s.emp_no = e.emp_no
		AND (
			salary = (SELECT salary from salaries order BY salary LIMIT 1)
			or
			salary = (SELECT salary from salaries order BY salary DESC LIMIT 1)
			)
;
			
SELECT e.emp_no, e.last_name, s.salary
FROM employees e
	JOIN salaries s
		ON s.emp_no = e.emp_no
		AND (
			s.salary = (SELECT MAX(salary) from salaries)
			or
			s.salary = (SELECT MIN(salary) from salaries)
			);
		
--
CREATE INDEX idx_test ON salaries(salary);
--
		
ORDER BY salary desc
;

바보 멍청이 야야 뚜잇 뚜잇 뚜이 ㅅ뚜잇 <- ???
;
COMMIT;
;
SELECT avg(asal.salary) salary_average
FROM (
		SELECT salary
		FROM salaries
		WHERE to_date >= NOW()
	)asal
	
;

SELECT AVG(salary)
FROM salaries
WHERE emp_no = 499975
;