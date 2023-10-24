트리거(Trigger)
이벤트(update, insert, delete)가 발생했을 때 발동
(자기가 직접 실행 불가)
 IN, OUT 매개 변수 없음

-- 실행 시기
AFTER 
BEFORE

--  임시테이블
OLD - 작동 전
NEW - 작동 후

-- 생성
DELIMITER $$
CREATE TRIGGER 트리거명
{BEFORE | AFTER} {INSERT | UPDATE| DELETE } -- 실행시기와 작업 선택
ON 테이블 -- 트리거를 부착할 테이블
FOR EACH ROW -- 아래 나올 조건에 해당하는 모든 row에 적용

BEGIN
트리거시 실행되는 코드
IF NEW.컬럼 != OLD.컬럼 THEN -- update 트리거는 old와 new 값이 존재한다.
UPDATE 테이블
SET 컬럼 = NEW.컬럼
WHERE 컬럼 = OLD.컬럼;
END IF;
END $$
DELIMITER ;

-- 실행
설정한 쿼리를 실행하면 자동작동

-- 트리거 확인
SHOW TRIGGERS;

-- 삭제
DROP TRIGGER 트리거명; 