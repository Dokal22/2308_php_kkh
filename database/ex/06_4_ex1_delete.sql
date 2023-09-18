-- 딜리트, 딜리트 프롬, 조건


DELETE FROM departments
WHERE dept_no = 'd010';


-- 오만일 이상 사원 데이터 다 삭제


DELETE FROM employees
WHERE emp_no >= 500001;


SELECT @@autocommit;

SET autocommit=FALSE;

FLUSH PRIVILEGES;

COMMIT;