<?php

// 닫는 태그 안함 html에서만 함;
// echo "인덱스 : ".$_GET["url"];

// htaccess라는 파일을 읽게 한다??
// LoadModule rewrite_module modules/mod_rewrite.so

// DocumentRoot "${SRVROOT}/htdocs/mini_multi_board"
// <Directory "${SRVROOT}/htdocs/mini_multi_board">
// => 이러면 ROOT기분이 바뀜 on conf

require_once("config.php"); // 설정파일 불러오기
require_once("autoload.php"); // 오토로드 파일 불러오기

// echo _EXTENSION_PHP;
// require_once("");

// 라우터 호출
new router\Router();