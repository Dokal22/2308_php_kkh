-- 코멘트
-- 환경설정으로 주석 단축키바꿈



-- SELECT [컬럼명] FROM [테이블명];

SELECT * FROM dept_emp;

SELECT first_name, last_name FROM employees;

SELECT emp_no, title FROM titles;



-- SELECT [컬럼명] FROM [테이블명] WHERE [쿼리조건];
-- [쿼리조건] : 컬럼명 [기호] 조건값

SELECT * from employees WHERE emp_no <= 10009;

SELECT * FROM employees WHERE first_name = 'Mary';

SELECT * FROM employees WHERE birth_date < 19600101;



-- and 연산자

SELECT * 
FROM employees 
WHERE birth_date <= 19700101 
  AND birth_date >= 19650101;

SELECT *
FROM employees
-- 아무말
WHERE first_name = 'Mary'
  OR last_name = 'Piazza';  
-- AND OR 

SELECT *
FROM employees
-- WHERE emp_no BETWEEN 10005 AND 10010; 아니 이놈은 기호 안쓰네
-- 근데 between이 >=,<=이것들보다 느림
WHERE emp_no = 10005
   OR emp_no = 10010;
-- WHERE emp_no IN(10005, 10010); 이걸로도 가능, 느림



-- ge로 시작하는
SELECT *
FROM employees
WHERE first_name LIKE('Ge%');

SELECT *
FROM titles
WHERE title LIKE('%staff%');

SELECT *
FROM employees
WHERE first_name LIKE('___ge_');



-- ORDER BY 정렬??
SELECT * FROM employees ORDER BY birth_date ASC;
SELECT * FROM employees ORDER BY birth_date DESC;
-- ASC 기본값 = 오름차순
-- DESC = 내림차순

SELECT * FROM employees ORDER BY birth_date, first_name;

-- 성 내림차, 이름 오름차, 생일 오름차
SELECT * 
FROM employees 
ORDER BY first_name DESC, last_name ASC, birth_date ASC;



-- DISTINCT = 중복 레코드 없애기, 느림 > where로 회피
SELECT DISTINCT emp_no, salary FROM salaries;

INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626);
COMMIT;

-- select 기본기다 이거야ㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑㅑ





-- 5. 집계 함수? sum?

SELECT SUM(salary) FROM salaries;

-- 현재 받고 있는 급여만 조회해주세요
SELECT * FROM salaries WHERE to_date >= 20230901;

SELECT SUM(salary) FROM salaries WHERE to_date >= 20230901;
SELECT MAX(salary) FROM salaries WHERE to_date >= 20230901;
SELECT MIN(salary) FROM salaries WHERE to_date >= 20230901;

SELECT AVG(salary) FROM salaries WHERE to_date >= 20230901;

SELECT COUNT(emp_no) FROM employees;
-- 이름 Mary인 사람 수

SELECT COUNT(emp_no) FROM employees WHERE employees.first_name = 'Mary';



-- GROUP by  그룹으로 나눠서 추출하기? having 집계함수 조건: group을 어떻게 묶을지
SELECT title, COUNT(title)
FROM titles
WHERE to_date >= 20230101
GROUP BY title HAVING title LIKE('%staff%');

SELECT COUNT(emp_no) FROM titles WHERE title = 'Engineer';



-- 알리아스 alias ? 컬럼명 별칭 만들어주기? > 나중에 php 쓸 때 호출 불편해서 바꾸는 용
SELECT title, COUNT(title) AS cooooount
FROM titles
WHERE to_date >= 20230101
GROUP BY title HAVING title LIKE('%staff%');



-- concat() : 문자열을 합쳐주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS full_naaaaame
FROM employees;


-- 여자사원의 사번, 생일, 풀네임(오름차) 출력
SELECT 
	emp_no
	, birth_date
	, CONCAT(first_name, ' ', last_name) AS full_name
FROM employees
WHERE gender = 'F'
ORDER BY full_name ASC;



SELECT * FROM employees ORDER BY emp_no
LIMIT 10 OFFSET 10;


-- 재직중인 사원들 중 급여가 상위 5위까지 출력

SELECT * 
FROM salaries 
WHERE to_date >= 20300101
ORDER BY salary desc
LIMIT 5;



-- 서브쿼리 : 쿼리 안에 쿼리
-- d002 부서의 현재 매니저의 정보를 가져오기

SELECT *
FROM employees
WHERE emp_no = (
	SELECT emp_no 
	FROM dept_manager 
	WHERE to_date >= 20300101 
	  AND dept_no = 'd002'
);


-- 현재 급여가 가장 높은 사원의 사번, 풀네임

SELECT 
	emp_no
	, CONCAT(first_name, ' ', last_name) 
			AS full_name
FROM employees
WHERE emp_no = (
	SELECT emp_no 
	FROM salaries
	WHERE to_date >= 20230101
	ORDER BY salary DESC
	LIMIT 1
);



-- 서브쿼리 결과가 복수일 때 
-- 부서장 뽑기
SELECT 
	emp_no
	, CONCAT(first_name, ' ', last_name) 
			AS full_name
FROM employees
WHERE emp_no =ANY(
	SELECT emp_no 
	FROM dept_manager
	WHERE dept_no = 'd001'
);
-- mariaDB에서는 = ANY, = ALL 을 IN() 대신으로 사용가능(서브쿼리에서만 가능)
-- =ANY = OR, =ALL = AND 

-- 현재 시니어 엔지니어인 사원의 사번, 생일 출력
SELECT 
	emp_no
	, birth_date
FROM employees
WHERE emp_no OR(
	SELECT emp_no
	FROM titles
	WHERE title = 'Senior Engineer'
	  AND to_date >= 20300101
	);



-- 다중열 서브쿼리 (속도 이슈?
SELECT *
FROM dept_emp
WHERE (dept_no, emp_no) IN (
	SELECT dept_no, emp_no
	FROM dept_manager
	WHERE to_date >= NOW()
);


-- 서브쿼리 응용. select : 존나 공부
-- 사원의 현재 급여, 현재 급여를 받기 시작한 날, 풀네임
SELECT 
	sal.salary
	, sal.from_date
	, (
		SELECT CONCAT(emp.first_name, ' ', emp.last_name)
		FROM employees AS emp
		WHERE sal.emp_no = emp.emp_no -- 샐러리에서 넘버존나  중복
	) AS full_name
FROM salaries AS sal
WHERE to_date >= NOW();


-- 서브쿼리 응용. from
SELECT *
FROM (
	SELECT *
	FROM employees
	WHERE gender = 'M'
) AS emp;

