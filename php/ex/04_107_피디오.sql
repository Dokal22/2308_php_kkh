INSERT INTO departments (
	dept_no
	,dept_name
)
VALUE (
	'd010'
	,'php504'
);

-- DELETE FROM departments
-- WHERE dept_no = 'd010';

SELECT * FROM departments;


COMMIT; -- 이걸 해줘야지 다른 곳에서 수정하든 뭘 하든 가능

FLUSH PRIVILEGES; -- 다른 애가 수정한거 받아오기







