SELECT *
FROM titles;

--

SELECT emp_no
FROM salaries
WHERE salary <= (
	60000
	);
	
--

SELECT emp_no
FROM salaries
WHERE salary 
	BETWEEN 60000 AND 70000;
	
--

SELECT *
FROM employees
WHERE emp_no IN(10001, 10005);

--

SELECT emp_no, title
FROM titles
WHERE title LIKE('%Engineer%');

--

SELECT last_name
FROM employees
ORDER BY last_name ASC;

--

SELECT emp_no, AVG(salary) AS avg
FROM salaries
GROUP BY emp_no;

--

SELECT emp_no, AVG(salary) AS avg_sal
FROM salaries
GROUP BY emp_no 
	HAVING avg_sal
		BETWEEN 30000 AND 50000;

-- 막혔었음

-- SELECT emp_no, last_name, first_name, gender
-- FROM employees AS emp
-- 	, (SELECT emp_no
-- 		FROM salaries AS sal
-- 		GROUP BY emp_no 
-- 			HAVING AVG(salary) >= 70000) AS avg_sal 
-- WHERE avg_sal >= 70000
-- 	AND emp.emp_no = sal.emp_no
-- ;

SELECT emp_no
	, last_name
	, first_name
	, gender
FROM employees -- AS 원래 생략 가능
WHERE emp_no IN ( -- 서브쿼리해서 졸라 많이 값이 나오면 IN 해결불가. 아님 조인으로 가야함
	SELECT emp_no
	FROM salaries sal
	GROUP BY emp_no
		HAVING AVG(sal.salary) >= 70000
	);

-- 막혔었음

SELECT emp_no, first_name
FROM employees
WHERE emp_no in (
	SELECT emp_no
	FROM titles
	WHERE title ='Senior Engineer'
	  AND to_date >= NOW()
	);