ALTER TABLE employees ADD COLUMN sup_no INT(11);

-- PRIVILEGES FLUSH

UPDATE employees
SET sup_no = 10001
WHERE emp_no = 10003;