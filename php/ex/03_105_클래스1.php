<?php

// 클래스는 비슷한것들 모아둔거래요(동족객체)

class ClassRoom{
	// 멤버 필드에 오셨ㅅ브니다
	// 접근제어 지시자 : public, private, protected
	// 멤버 변수가 이 밑에거임?
	public $computer; // 어디에서나 접근 가능
	private $book; // 클래스 안에서만 가능
	protected $bag; // 클래스와 나를 상속받은 자식클래스 내에서만

	public function class_room_set_value(){// 이거 메소드라 함
		$this->computer="컴퓨터"; // 클래스 안으로 접근
		$this->book="책";
		$this->bag="가방";
	}

	public function class_room_output(){
		echo $this->computer,"\n";
		echo $this->book,"\n";
		echo $this->bag,"\n";
	}

}

//접근해보까
// class instance 생성
$objClassRoom=new ClassRoom(); // 값 변경 가능
$objClassRoom->class_room_set_value();
$objClassRoom->class_room_output();
var_dump($objClassRoom->computer);