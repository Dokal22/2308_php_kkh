SELECT @@autocommit;

SET autocommit=FALSE;

FLUSH PRIVILEGES;

COMMIT;

DELETE FROM employees
WHERE emp_no = 500000;