STORED PROCEDURE
스토어드 프로시저
	쿼리를 모아 함수처럼 쓸라고 모은거
	
	

장점 : 한번에 여래개, 네트워크 부하 감소
		 램 안써서 빠름(?)
		 
단점 : php쪽이랑 맞춰줘야함
		 유지관리보수 하타치


STORED FUNCTION 

얘는 그냥 진짜 함수라 셀렉트 못하고 값 하나만 나오게 함, IN, OUT 선언없음

;
delimiter $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS int
BEGIN
	RETURN num1 + num2;
END $$
delimiter -- 델리미터 하고 띄어쓰기 해야함? ㄷㄷ
-- delimiter $$로 다시 받을 수도 있나봄
;


SELECT my_sum(1,2);

SHOW FUNCTION STATUS;