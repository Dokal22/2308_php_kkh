<?php

// 네임스페이스와 유즈
// 클래스를 구분해주기 위해 설정, 보통 파일 패스(주소)로 작성함
namespace up; // 내 밑으로 모여


class Class1{
	public function __construct(){
		echo "위의 클래스1\n";
	}
}


namespace down;

class Class1{
	public function __construct(){
		echo "아래의 클래스1\n";
	}
}

// $obj_class1 = new Class1(); // 같아서 안됨
// $obj_class1 = new \up\Class1(); // 클래스 앞에 네임스페이스로 호출

namespace test; // 위와 구분
// 유즈
use \up\Class1 as c1;
use \down\Class1 as c2;
$obj_class1 = new c1();
