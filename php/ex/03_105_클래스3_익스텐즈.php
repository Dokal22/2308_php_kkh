<?php

// 익스텐즈(extends)
// 부모 클래스의 프로퍼티(멤버,메소드)를 상속받는 것
class Parents{
	public function print_p(){
		echo "부모클ㄹ래스에서 출력\n";
	}


	// public function __construct(){
	// 	echo "부모\n";
	// }
}


class Child extends Parents { // 상속받음
	// 오버라이딩 : 부모 클래스에서 정의한 프로퍼티를 자식클래스에서 재정의 하는 것
	public function print_p(){ // 이름 같아서 덮어쓰기
		parent::print_p();// 자식이 부모호출
		echo "짜식클ㄹ래스에서 출력\n";
	}


// 	public function __construct(){
// 		echo "자식\n";
// 	}
}


$obj_child = new Child();
$obj_child->print_p();