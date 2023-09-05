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
		and sal.to_date >= NOW()
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
		and depe.to_date >= NOW()
	JOIN departments dept
		ON dept.dept_no = depe.dept_no
;
-- 5
SELECT emp.emp_no, CONCAT(emp.first_name,' ',emp.last_name) full_name, sal.salary
FROM employees emp
	jOIN salaries sal
		ON emp.emp_no = sal.emp_no	
		and sal.to_date >= NOW()
ORDER BY salary desc
LIMIT 10
;
-- 6
SELECT dept.dept_name, CONCAT(emp.first_name,' ',emp.last_name) full_name, emp.hire_date
FROM employees emp
	JOIN dept_emp depe
		ON depe.emp_no = emp.emp_no
	JOIN dept_manager depm
		ON depm.emp_no = emp.emp_no
		AND depm.to_date >= NOW()
	JOIN departments dept
		ON dept.dept_no = depe.dept_no
;
-- SELECT from_date
-- FROM dept_emp
-- WHERE emp_no = 110039;

-- 7
SELECT  tit.title, round(AVG(salary)) 평균
FROM salaries sal
	JOIN titles tit
		ON tit.emp_no = sal.emp_no
		AND tit.to_date >= NOW()
		AND tit.title = 'Staff'
WHERE sal.to_date >= NOW()
;
-- 8
SELECT CONCAT(emp.first_name,' ',emp.last_name) full_name, emp.hire_date, emp.emp_no, depm.dept_no
FROM employees emp
	JOIN dept_manager depm
		ON depm.emp_no = emp.emp_no
;
-- 9
SELECT tit.title, floor(AVG(sal.salary)) avrg
FROM salaries sal
	JOIN titles tit
		ON tit.emp_no = sal.emp_no
	  AND tit.to_date >= NOW()
where sal.to_date >= NOW()
GROUP BY tit.title
	HAVING avrg >= 60000
ORDER BY avrg desc
; 
-- 10
-- SELECT emp.gender, emp.last_name, tit.title, COUNT(title) 사원수
SELECT tit.title, COUNT(emp.emp_no) count_1 -- 카운트 안에 *넣어도 됨
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND to_date >= NOW()
where emp.gender = 'F' 
GROUP BY tit.title 
;
-- 11
SELECT *
FROM employees emp
	JOIN salaries sal
	  ON emp.emp_no = sal.emp_no
WHERE gender = 'F'
	AND emp_no != (sal.to_date = 99990101)
GROUP BY emp.emp_no
;
실패!

답안지;

SELECT emp.gender, COUNT(*)
FROM employees emp
	JOIN (
		SELECT emp_no
		from titles t
		GROUP BY t.emp_no HAVING MAX(t.to_date) != 99990101 -- 그룹 활용이 지린다
		) tit
		ON emp.emp_no = tit.emp_no
GROUP BY emp.gender
HAVING emp.gender = 'f'
;