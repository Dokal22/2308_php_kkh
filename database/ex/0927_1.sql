-- 1
SELECT *
FROM titles
;

-- 2
SELECT emp_no-- , salary
FROM salaries
WHERE salary<=60000
;

-- 3
SELECT emp_no, salary
FROM salaries
WHERE salary>=60000
  AND salary<=70000
;

-- 4 조인해볼래?
SELECT *
FROM employees
WHERE emp_no IN(10001, 10005)
;

SELECT *
FROM employees
	JOIN dept_emp
WHERE emp_no IN(10001, 10005)
;

-- 5
SELECT emp_no, title
FROM titles
WHERE title LIKE '%Engineer%'
;

-- 6
SELECT last_name
FROM employees
ORDER BY last_name ASC 
;

-- 7
SELECT emp_no, AVG(salary)
FROM salaries
GROUP BY emp_no
;

-- 8
SELECT emp_no, AVG(salary) AS avg_sal
FROM salaries
GROUP BY emp_no HAVING avg_sal >= 30000 AND avg_sal <= 50000
;

-- 9
SELECT emp.emp_no, last_name, first_name, gender
FROM employees emp
	JOIN (
		SELECT emp_no
		FROM salaries
		GROUP BY emp_no HAVING AVG(salary) >= 70000
	) avg_emp
	ON avg_emp.emp_no = emp.emp_no
;
-- SELECT emp_no, AVG(salary) AS avg_sal
-- FROM salaries
-- GROUP BY emp_no HAVING avg_sal >= 70000
-- ;

-- 10
SELECT e.emp_no, gender
FROM employees e
	JOIN titles t
	ON t.emp_no = e.emp_no
WHERE t.to_date >= NOW()
  AND title = 'Senior Engineer'
