FLUSH PRIVILEGES;

ROLLBACK;

SELECT 
	 	 COUNT(id) cnt 
	 FROM 
	 	 boards
	 where
		 delete_flg = 0
		 and id > 63
		 ;
		 
		 
		 
 select 
			j.id 
			,j.item_name 
			,j.amount 
			,j.d_day 
			,t.tag_img 
		 from 
			 jang j 
		 	join 
			  tag_type t 
		  on 
		     j.tag_id = t.tag_id 
		 where 
		     j.finished = 0 
		 order by 
		     j.d_day desc 
		     ,j.id desc 	
			  ;	 
			  
			  update 
			jang 
		 set 
		  	finished = '1' 
		  	,finished_at = date(NOW()) 
		 where 
		  	id = 6;
		  	SELECT date(NOW())
		  	;
		  	
		  	INSERT INTO jang (
		  		item_name
		  		,amount
		  		,d_day
		  		,tag_id
		  		,memo
		  	)
		  	VALUES (
		  		'오토커밋을 php로'
		  		,1
		  		,20231020
		  		,0
		  		,'해보자'
		  	);
		  	
		 update 
			jang 
		 set 
		  	finished = '1' 
		  	,finished_at = date(now()) 
		 where 
		  	date(NOW()) > d_day 
		;
		 update 
			jang 
		 set 
		 finished = '0' 
		  	,finished_at = null 
		wherejang
			id = 35
		;
		 SELECT 
			j.id 
			,j.item_name 
			,j.amount 
			,j.d_day 
			,j.finished_at 
			,t.tag_img 
		 FROM
			 jang j 
		 	join 
			  tag_type t 
		   on 
		     j.tag_id = t.tag_id 
		 where 
		     j.finished = 1 
		 order by 
		     j.d_day 
		     .j.id desc 
		     ;
select timestamp(NOW());
		
		ALTER TABLE jang modify COLUMN finished_at timestamp;
		
		UPDATE tag_type
		SET 
			tag_img = 'animal.png'
		WHERE tag_id = 5
		;
		
		COMMIT;
		FLUSH PRIVILEGES;