INDEX 인덱스
	인서트할 때 인덱스 많으면 느려짐 (정렬 바꾸느라 오래걸림)
	B+ Tree 인덱스 : 나무 가지치기
	

단점 : 인덱스 저장공간 필요

주의: 적은거 검색 유리, 느리면 쿼리먼저 확인, fk로 지정하면 인덱스 생선되는 곳도 있고 없는 곳도 있고

;
SHOW INDEX FROM employees
;

인덱스 추가
;
CREATE INDEX idx_employees_last_name
	ON employees(last_name)
;


;
drop INDEX idx_employees_last_name
	ON employees
;


