SELECT *
FROM tasks
WHERE deleted_at IS NOT NULL
AND project_id = 370
;
SELECT *
FROM users u
JOIN project_users pu
ON u.id = pu.member_id
WHERE pu.project_id = 370
;
SELECT *
FROM project_users
WHERE member_id = 47
;
-- 240101 김관호 업무상태현황 카운트 확인
SELECT *
FROM tasks tk
  JOIN project_users pju
    ON pju.project_id = tk.project_id
   AND pju.member_id = 47
  JOIN projects pj
    ON pj.id = tk.project_id
   AND pj.deleted_at IS NULL 
WHERE tk.task_status_id = 0
  AND tk.deleted_at IS NULL
  AND tk.category_id = 0
;
-- 양수진 업무상태현황 카운트 중 '시작전'
SELECT *
FROM tasks tk
  JOIN project_users pju
    ON pju.project_id = tk.project_id
   AND pju.member_id = 47
  JOIN projects pj
    ON pj.id = tk.project_id
WHERE tk.task_status_id = 0
  AND tk.deleted_at IS NULL
  AND tk.category_id = 0
;
-- 양수진 마감리스트 출력
SELECT *
FROM tasks tk
  JOIN project_users pju
    ON pju.project_id = tk.project_id
   AND pju.member_id = 47
  JOIN projects pj
    ON pj.id = tk.project_id
  JOIN basedata bd1
    ON bd1.data_content_code = pj.color_code_pk
   AND bd1.data_title_code = 3
  JOIN basedata bd2
    ON bd2.data_content_code = tk.task_status_id
   AND bd2.data_title_code = 3
WHERE tk.task_status_id != 3
  AND tk.task_depth = 0
  AND tk.deleted_at IS NULL
  AND tk.category_id = 0
;
-- 김관호 마감리스트 출력
SELECT *
FROM tasks tk
  JOIN project_users pju
    ON pju.project_id = tk.project_id
   AND pju.member_id = 47
   AND pju.deleted_at IS NULL 
  JOIN projects pj
    ON pj.id = tk.project_id
   AND pj.deleted_at IS NULL 
  JOIN basedata bd1
    ON bd1.data_content_code = pj.color_code_pk
   AND bd1.data_title_code = 3
  JOIN basedata bd2
    ON bd2.data_content_code = tk.task_status_id
   AND bd2.data_title_code = 3
WHERE tk.task_status_id != 3
  AND tk.task_depth = 0
  AND tk.deleted_at IS NULL
  AND tk.category_id = 0
;