모델: 데이터베이스 - mariaDB
뷰: 유저가 볼 수 있는 화면 - html, css
컨트롤러: 로직 짜주는 애 - php

모뷰컨 = MVC


Options -MultiViews 
RewriteEngine On <= host 뒤에 있는 애들을 읽어서 사용
Options -Indexes <= 폴더 구성을 보는 거 끄기
RewriteCond %{REQUEST_FILENAME} !-d <= 아마도 파일이랑 폴더 지정할 것이라는 뜻?
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L] <= 호스트 뒤에꺼 읽어서 계산하고?   어디로 보내겠다???

localhost/user/login
=> url="user/login"

Location: /index.php/?url=user/login
이렇게 해서 인덱스에서 출발하는ㄷ스