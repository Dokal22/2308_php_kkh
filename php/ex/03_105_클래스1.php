<?php

// 클래스는 비슷한것들 모아둔거래요(동족객체)

class ClassRoom{
	// 멤버 필드에 오셨ㅅ브니다
	// 접근제어 지시자 : public, private, protected
	// 멤버 변수가 이 밑에거임?
	public $computer; // 어디에서나 접근 가능
	private $book; // 클래스 안에서만 가능
	protected $bag; // 클래스와 나를 상속받은 자식클래스 내에서만
	private $now;


	// 생성자 (컨스트럭트?), 선언 안해도 원래 있는거
	public function __construct() { // 꼭 이름이 __construct 이어야 한다
	// 무적권 퍼블릭
		echo "컨스트럭트 실행\n";
		$this->now=date("Y-m-d H:i:s");
	}



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

	// getter 메소드/setter는 값지정? // 두 놈 다 private랑 protected 접근하는 용인듯
	public function get_now() {
		return $this->now;
	}

	// setter 메소드
	public function set_now() {
		$this->now = "9999-01-01 00:00:00";
	}



	// 스태틱(static) : 인스턴스 생성 없이 호출 가능
	public static function static_test(){
		echo "스태틱 메소드 입니다\n";
	}
	public static $static="스태틱 변수멤버?\n";

}

//접근해보까

// class 인스턴스(instance) 생성
// $objClassRoom=new ClassRoom(); // 값 변경 가능
// $objClassRoom->class_room_set_value();
// $objClassRoom->class_room_output();
// var_dump($objClassRoom->computer);
// $objClassRoom->set_now();
// echo $objClassRoom->get_now();

// 스태틱 쓰는법 ::
ClassRoom::static_test();
echo ClassRoom::$static;


// 상수 선언

class NOTPDO{
	const SANGSU=1;
	const SANGSU_2=2;
}
