-- case ~ when ~ ELSE ~ END : 다중분기를 위해 사용
	case
		when 수식1 then 결과 1
		when 수식2 then 결과 2		
		else 결과3
	  END 
;  
SELECT e.emp_no
	,e.gender
	,case e.gender -- 케이스 체크할 대상
		when 'M' then '남자' -- 대상값과 그러면~
		ELSE '여자'
	END AS ko_gender -- 끝내기
		
FROM employees AS e
;

UPDATE titles
SET to_date = NULL
WHERE emp_no = 500000
;

-- 투데이트가 널 아님 9999 머시기면 '현재직책'
-- 그 외는 '지금은 아님'

SELECT *, 
	case to_date
		when NULL then '현재직책'
		when 99990101 then '현재직책'
		ELSE '지금은 아님'
		END 현재_직책인가
FROM titles
ORDER BY emp_no DESC;
-- to_date is null 이러고 웨어절에서 확인하나봄

SELECT *, 
	case date(ifnull(to_date,99990101)) -- 위에꺼 널이 인식 안돼서 선생님이 써줌
--	   값이 문자로 반환되어서 DATE, 이프널 앞에께 널일 수도 있어서 뒤에꺼를 준비해봤어공식의 ifull
		when 99990101 then '현재직책'
		ELSE '지금은 아님'
		END 현재_직책인가
FROM titles
ORDER BY emp_no DESC;


--


SELECT *
FROM titles
WHERE to_date IS not NULL;







-- 문자열 함수

SELECT CONCAT_WS('/','딸기','바나나','토마토','수박');
-- 맨 앞에꺼를 중간중간에 넣어주는군.

select FORMAT(123456, 2);
-- (콤마드가는 값, 소수점)

SELECT LEFT('123456',3);
SELECT right('123456',3);
-- 좌우(문자를, 잘라주마(값))

SELECT upper('abcdef');
SELECT lower('ABCDEF');
-- 대소문자(문자), 이름을 걍 다 소문/대문자로 불러올 때 빼고 안쓴다함

SELECT LPAD('13',10,'07'); -- 왼쪽에 나머지 채우기
SELECT RPAD('42',10,'80'); -- 오른쪽에 나머지 채우기
-- (문자열, 길이, 채울문자)

SELECT TRIM('  ABCDEF   ');
-- 공백 제거
-- LTRIM, RTRIM : 좌우 공백선택제거 존재함 ㅇㅇ

select TRIM(LEADING 'cde' FROM 'abcedfg');
-- (방향 부분문자열 프롬 문자열큰거) 부분제거

SUBSTRING(문자열,시작위치,길이) : 문자열의 시작위치부터 몇글자를 가져와서 출력하겠다...!   

SUBSTRING_index(문자열,구분자,횟수) : 구분자(문자 중간에 넣는거, 위에는/임)
										  가 횟수만큼 나오면 그 횟수 뒤로 출력자체를 안하기
						ex) (ㄴㅇㄹㄴㅇㄹ.html,'.',1) 하면 파일명 제거
						





-- 수학함수


올림 : CEILING(1.4) -> 2
		 CEIL(1.4)도 동일
		 
내림 : FLOOR(1.4) -> 1

반올림 : ROUND(사사오입)

소수점자리수 없애기 : TRUNCATE(숫자,출력할 소숫점자리수)
-- **주의 이걸로 데이터 날리면 복구불가**







-- 날짜 함수


현재시 : NOW()
 응용 - DATE(NOW()) 시간제거

날짜 합산 : ADDDATE(날짜, INTERVAL 몇 (일/월/년))
				SUBDATE 기본이 빼기

시간 합산 : ADDTIME(시간, 더하거나 뺄 시간)
				subtime

;
SELECT ADDDATE(NOW(), INTERVAL -1 YEAR);





-- 순위함수

;
SELECT emp_no, salary, RANK() over(ORDER BY salary desc) RANK -- 개느림
FROM salaries
LIMIT 10; 

SELECT emp_no, salary, row_number() over(ORDER BY salary desc) 머시기 -- 개느림
FROM salaries
LIMIT 10; 

볶음면 개땡긴다

