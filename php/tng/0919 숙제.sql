INSERT INTO employees
VALUES(
	700002
	,20000101
	,'first'
	,'last'
	,'M'
	,20230919
-- 	,null
);
COMMIT;


-- dELETE FROM employees
-- WHERE emp_no = 500001;

--  SELECT e.emp_no, e.first_name, e.last_name, t.title 
SELECT *
 from employees e
 left outer join titles t
    on e.emp_no = t.emp_no
 WHERE t.title IS NULL
--  GROUP BY e.emp_no DESC LIMIT 
 ;
 
 
 SELECT *
 FROM employees e
 WHERE e.emp_no NOT IN (SELECT emp_no FROM titles)
 ;
 
 INSERT INTO titles
 VALUES(
	700000
	,green
	,NOW()
	,99990101
 ) 
 ;
 
 DELETE FROM titles
 WHERE emp_no >= 700000
 ;
 
 FLUSH PRIVILEGES;
 COMMIT;