<?php
// 클래스좌표에서 받아오기 때문에 \를 /로 바꾼다
spl_autoload_register( function($classPath) { // 얘 부르고 다음으로 선언되는 놈들 다 require
    $classPath = str_replace("\\", "/", $classPath);
    
    require_once($classPath._EXTENSION_PHP);
});
