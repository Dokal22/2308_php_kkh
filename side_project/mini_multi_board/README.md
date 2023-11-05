모델: 데이터베이스 - mariaDB
뷰: 유저가 볼 수 있는 화면 - html, css
컨트롤러: 로직 짜주는 애 - php

모뷰컨 = MVC


Options -MultiViews // <= 확장자 없어도 찾아가는거 끄기(있었나?).231105
RewriteEngine On <= 이 기능을 쓸 것이다
Options -Indexes <= 폴더 구성을 보는 거 끄기 // 그 폴더 입력하면 화면에 폴더 뜨는 것들 얘기.231105
RewriteCond %{REQUEST_FILENAME} !-d <= 아마도 파일이랑 폴더 지정할 것이라는 뜻? // -f,-d 폴더랑 파일 없는 것들만 적용된다는거 같은데 그러면 실제 퍼블리싱할 때는 다르게 주나.231105
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L] <= 호스트 뒤에꺼 읽어서 계산하고?   어디로 보내겠다??? // => [$url = $_GET["url"];] 이거 쓸라고 넣은거.231105

localhost/user/login
=> url="user/login"

Location: /index.php/?url=user/login
이렇게 해서 인덱스에서 출발하는ㄷ스


4. DateBase
    1) user(유저) Table
        - pk, 아이디, 비밀번호, 이름, 가입일자, 수정일자, 탈퇴일자
    2) board(게시판) Table
        - pk, 유저pk, 게시글 타입, 제목, 내용, 이미지파일, 작성일자, 수정일자, 삭제일자
    3) boardname(게시판 기본 정보) Table
        - pk, 게시판 타입, 게시판이름