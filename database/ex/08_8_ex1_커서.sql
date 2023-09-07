커서
CURSOR

	그냥 텍스트 쓸라고 반짝반짝 거리는 막대같은거 인듯
	이걸 행 위치를 변경시키는 머시긴가
	
	근데 그 커서에 데이터를 담을 ㅅㅜ 있나?
	
	
	레코드 값을 순차적이나 특정적으로 가져와서 쓰고싶어서 생긴게 커선가?


-- (Cursor) 
한 행씩 처리하기 위한 방식

-- 구조
	DELIMITER $$
	CREATE PROCEDURE test()
	BEGIN
	DECLARE sal INT;
	DECLARE sum_sal INT;
	DECLARE cur_sal INT;
	DECLARE end_row BOOLEAN DEFAULT FALSE;

	-- 선언
	DECLARE cur_sal CURSOR FOR
		SELECT salary FROM salaries WHERE emp_no = 10001;

	-- 행이 끝이면 end_row에 true 대입
	DECLARE CONTINUE HANDLER FOR NOT FOUND
		SET end_row = TRUE;

	-- 커서 오픈
	OPEN cur_sal;

	-- 루프 시작
	cursor_loop: LOOP
		-- 
		FETCH cur_sal INTO sal;

		-- 행이 긑이면 루프 종료
		IF end_row THEN
			LEAVE cursor_loop;
		END IF;
		
		SET sum_sal = sum_sal + sal;
	END LOOP cursor_loop;

	SELECT sum_sal;
	END $$
	DELIMITER ;