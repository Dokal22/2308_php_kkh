조인

테이블을 묶어서 가져온다?

아우터, 유니온, 이너 머시기저시기

SELECT 칼럼1, 칼럼2
from 테이블1 INNER JOIN 테이블2
 ON 조인조건 -- 키 연결?
WHERE 검색조건

- 두 테이블에 공통된 거 가져오기= 이너

;
SELECT emp.emp_no, emp.first_name, emp.last_name, dp.dept_no
	FROM employees emp
		INNER JOIN dept_emp dp
 			ON emp.emp_no = dp.emp_no
 			AND dp.to_date >= NOW()
ORDER BY dp.dept_no, emp.emp_no DESC;




아우터 조인
좌우 있음
;
SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	LEFT OUTER join dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >= 110000
;



유니온 : 두 결과 합치기 (ALL 하면 중복)



셀프조인 : 자기를 조인함(?)
SELECT 칼럼1, 칼럼2
FROM 테이블1
	JOIN 테이블1
WHERE 검색조건


