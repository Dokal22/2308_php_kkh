select DATE_ADD(NOW(),INTERVAL 1 DAY);


-- 데이터 타입변환

SELECT cast(1234 AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));


-- 제어 흐름 함수

if(수식, 참일 때, 거짓일 때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
;
SELECT if(0=1, 'charm', 'poor');
SELECT e.emp_no, if(e.gender = 'M', '수컽', '앰컽') AS gender
FROM employees e; 


IFNULL(수식1, 수식2) : 수식 1이 NULL이면 수식2를 출력
										, NULL이 아니면 수식1를 출력
										
;
SELECT IFNULL('수식이나 컬럼','또다른 나');
SELECT IFNULL(NULL,'또다른 나'); 와 

;	SELECT IFNULL('11','수식2');
	SELECT emp_no
		,title -- 그냥 if가 null을 받았을 때 못하는게 있어서 만든건가?
		,IFNULL(to_date, DATE(NOW())) AS to_date 
	FROM titles
	ORDER BY emp_no DESC;
	
	SELECT emp_no, if(to_date = 1, '찐', '짜가')
	FROM titles
	WHERE to_date = 500000;
	
	
	UPDATE titles
	SET to_date = NULL
	WHERE emp_no = 500000;
	
	
	
	
NULLIF(수식1, 수식2): 수식1과 2가 같으면 NULL 반환하고, 다르면 수식1을 반환합니다.

;
SELECT NULLIF(1,1);
SELECT NULLIF(1,2);

7_2
;
SELECT emp_no
	,title 
	,to_date
	,NULLIF(to_date, 99990101) AS to_date2
FROM titles
ORDER BY emp_no DESC;