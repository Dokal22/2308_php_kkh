ALTER TABLE members ADD COLUMN age INT NOT NULL; -- 오라클은 못함. 마디는 낫널인데 값을 안줘서 그냥 0 줌. 디폴트를 안줬는데도
ALTER TABLE members MODIFY COLUMN mem_name VARCHAR(50) NOT null; 
ALTER TABLE members DROP COLUMN age; -- 얘네도 롤백못하네

DROP TABLE points;


TRUNCATE TABLE members; -- 롤백 불가




오토인크리먼트 : 레코드 늘어날 수록 자동으로 커지는 값
auto_increment	  삭제된 값 재사용x
					  pk에서만 적용 가능
					  ;
ALTER TABLE 테이블명 MODIFY COLUMN 컬럼명 INT PRIMARY KEY AUTO_INCREMENT;

INSERT INTO members(mem_name)VALUES('기무간');

오토인크리먼트 (초기화하기x) 특정값으로 설정
ALTER TABLE 테이블명 AUTO_INCREMENT = 2147483646; -- 내려가는 건 안됨 ㅋㅋㅋㅋ 그럴 땐 truncate씀