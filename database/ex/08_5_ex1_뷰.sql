VIEW 
	가상테이블. FOR 보안, 사용자 편의성
	여러 테이블을 조인할 시에 사용?
	
	
;
CREATE [OR relplace] VIEW 뷰명 -- or replace : 기존 뷰 덮어쓰기
AS
	SELECT 문
	;
	
CREATE VIEW view_employed_emp -- 근데 뷰가 되게 느림
AS
	SELECT e.*, t.title
		,case t.to_date
			when 99990101 then '0'
			ELSE '1'
			END exp_date
	FROM employees e
		JOIN titles t
			ON t.emp_no = e.emp_no
	-- 		AND t.to_date >= NOW()
	GROUP BY emp_no
;

SELECT * FROM view_employed_emp;

--