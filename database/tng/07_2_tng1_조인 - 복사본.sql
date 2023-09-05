-- 1
SELECT emp.emp_no, CONCAT(emp.first_name,' ',emp.last_name) full_name, tit.title
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no	
;
-- 2
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no	
		WHERE sal.to_date >= NOW()
;
-- 3
SELECT emp.emp_no, CONCAT(emp.first_name,' ',emp.last_name) full_name, sal.salary, sal.to_date
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no	
WHERE emp.emp_no = 10010
;
-- 4
SELECT emp.emp_no, CONCAT(emp.first_name,' ',emp.last_name) full_name, dept.dept_name
FROM employees emp
	JOIN dept_emp depe
		ON depe.emp_no = emp.emp_no	
	JOIN departments dept
		ON depe.dept_no = dept.dept_no	
;
-- 5
SELECT emp.emp_no, CONCAT(emp.first_name,' ',emp.last_name) full_name, sal.salary
FROM employees emp
	jOIN salaries sal
		ON emp.emp_no = sal.emp_no	
		WHERE sal.to_date >= NOW()
		ORDER BY salary desc
LIMIT 10
;
-- 6
SELECT dept.dept_name, CONCAT(emp.first_name,' ',emp.last_name) full_name, depe.from_date
	jOIN dept_emp depe
		ON depe.emp_no = emp.emp_no
	JOIN dept_manager depm
		ON depm.emp_no = emp.emp_no
	JOIN departments dept
		ON dept.dept_no = depe.dept_no
WHERE depm.to_date >= NOW()
;
-- SELECT from_date
-- FROM dept_emp
-- WHERE emp_no = 110039;


-- 7